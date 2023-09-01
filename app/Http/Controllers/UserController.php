<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember'); // Check if "Remember Me" checkbox is checked

        $exist = auth()->attempt([
            'email' => $email,
            'password' => $password
        ], $remember); // Pass the $remember value to the attempt method

        if ($exist) {
            if ($remember) {
                // Check if the user is an admin or not
                $rememberToken = Str::random(60);
                auth()->user()->update(['remember_token' => hash('sha256', $rememberToken)]);
                $minutes = 60 * 24 * 30; // 30 days

                if (auth()->user()->role == 1) {
                    return redirect()->route('admin.goal')->withCookie(cookie('remember_me', $rememberToken, $minutes));
                } else {
                    return redirect()->route('user.goal')->withCookie(cookie('remember_me', $rememberToken, $minutes));
                }
            } else {
                if (auth()->user()->role == 1) {
                    return redirect()->route('admin.goal');
                } else {
                    return redirect()->route('user.goal');
                }
            }
        } else if ($request->hasCookie('remember_me')) {
            $rememberToken = $request->cookie('remember_me');
            $user = User::where('remember_token', $rememberToken)->first();
            if ($user) {
                // Log the user in
                Auth::login($user);

                $redirectRoute = $user->role == 1 ? 'admin.goal' : 'user.goal';
                return redirect()->route($redirectRoute);
            }
        } else {
            return redirect()->route('login')->with('alert', [
                'type' => 'error',
                'message' => 'Your Email address and password are not valid'
            ]);
        }
    }

    public function logout()
    {
        $user = auth()->user();
//        $rememberToken = $user->remember_token;
        $rememberToken = request()->cookie('remember_me');
        auth()->logout();
        if ($user) {
            $user->update([
                'remember_token' => $rememberToken
                // 'remember_token' => null
            ]);
        }

        return redirect()->route('login');
    }

    public function profile() {
        $users = User::paginate(7);

        return view('admin.profile', compact('users'));
    }

    public function updateProfile(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->first_name = $request->profile_first_name;
        $user->last_name = $request->profile_last_name;
        $user->email = $request->profile_email;
        $user->save();

        return redirect()->route('admin.profile');
    }

    public function updateProfilePassword(Request $request) {
        $oldPassword = $request->profile_old_password;
        $newPassword = $request->profile_new_password;
        $confirmPassword = $request->profile_confirm_password;

        if($newPassword != $confirmPassword) {
            return redirect()->route('admin.profile')->with('alert', [
                'type' => 'error',
                'message' => 'Password do not match'
            ]);
        }

        if (Hash::check($oldPassword, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($newPassword)
            ]);

            return redirect()->route('admin.profile')->with('alert', [
                'type' => 'success',
                'message' => 'Password updated'
            ]);
        } else {
            return redirect()->route('admin.profile')->with('alert', [
                'type' => 'error',
                'message' => 'Incorrect old password'
            ]);
        }
    }

    public function createUser(Request $request) {
        $emailExists = User::where('email', $request->new_email)->exists();

        if($emailExists) {
            return redirect()->route('admin.profile')->with('alert', [
                'type' => 'error',
                'message' => 'Email exists already.'
            ]);
        }

        User::create([
            'first_name' => $request->new_first_name,
            'last_name' => $request->new_last_name,
            'email' => $request->new_email,
            'password' => Hash::make('password'),
            'role' => $request->new_role,
            'status' => 1,
        ]);

        return redirect()->route('admin.profile')->with('alert', [
            'type' => 'success',
            'message' => 'User created'
        ]);
    }

    public function updateUser(Request $request) {
        $user = User::findOrFail($request->edit_id);

        $user->first_name = $request->edit_first_name;
        $user->last_name = $request->edit_last_name;
        $user->email = $request->edit_email;
        $user->role = $request->edit_role;
        $user->save();

        return redirect()->route('admin.profile')->with('alert', [
            'type' => 'success',
            'message' => 'User updated'
        ]);
    }

    public function updateUserStatus($user_id, $status) {
        $user = User::findOrFail($user_id);
        $user->status = $status;
        $user->save();

        return redirect()->route('admin.profile')->with('alert', [
            'type' => 'success',
            'message' => 'Status updated'
        ]);
    }

    public function deleteUser($user_id) {
        $user = User::findOrFail($user_id);
        $user->goals()->delete();
        $user->targets()->delete();
//        $user->admingoal()->delete();
        $user->delete();

        return redirect()->route('admin.profile')->with('alert', [
            'type' => 'success',
            'message' => 'User deleted'
        ]);
    }

    public function updateuserPassword(Request $request) {
        $user = User::findOrFail($request->edit_user_pass_id);
        $user->password = Hash::make($request->user_new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('alert', [
            'type' => 'success',
            'message' => 'Password updated'
        ]);
    }
}
