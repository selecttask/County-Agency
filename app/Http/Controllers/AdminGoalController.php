<?php

namespace App\Http\Controllers;

use App\Models\AdminGoal;
use App\Models\GoalUser;
use App\Models\GoalUserTarget;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminGoalController extends Controller
{
    public function index()
    {
        // Check if active goal exists
        $currentDate = Carbon::now()->toDateString();

        $goal = AdminGoal::where('status', 1)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        if ($goal) {
            $users = User::where('role', '<>', 1)
                ->with('goals') // Eager load the goalUser relationship
                ->get();
            $upcomingGoal = $this->upcomingGoal(); // Fetch upcoming goals with user data
            $upcomingGoalUsers = null;
            if ($upcomingGoal) {
                $upcomingGoalUsers = $this->upcomingGoalUsers($upcomingGoal->id); // Fetch upcoming goals with user data
            }

            $goalId = $goal->id; // Replace this with the actual goal ID you want to query

            $latestGoalUserTarget = GoalUserTarget::where('goal_id', $goalId)
                ->latest('updated_at')
                ->first();

            $lastUpdate = $latestGoalUserTarget ? $latestGoalUserTarget->last_update : '00-00-0000';

            // Paginate the users relationship
            $goalUsers = $goal->users()->paginate(4); // Adjust the pagination limit as needed

            return view('admin.active-goal', compact('goal', 'upcomingGoal', 'upcomingGoalUsers', 'goalUsers', 'users','lastUpdate'));
        } else {
            $upcomingGoal = $this->upcomingGoal(); // Fetch upcoming goals with user data
            $upcomingGoalUsers = null;
            if ($upcomingGoal) {
                $upcomingGoalUsers = $this->upcomingGoalUsers($upcomingGoal->id); // Fetch upcoming goals with user data
            }
            $users = User::where('role', '<>', 1)->get();
            return view('admin.goals', compact('users', 'upcomingGoal', 'upcomingGoalUsers'));
        }
    }

    public function upcomingGoal()
    {
        $currentDate = Carbon::now();
        $upcomingGoal = AdminGoal::where('start_date', '>', $currentDate)
            ->where('status', 1)
            ->with('users')
            ->first();
        return $upcomingGoal;
    }


    public function upcomingGoalUsers($id)
    {
        $users = [];

        $goalUsers = GoalUser::where('goal_id', $id)
            ->join('users', 'goal_users.user_id', '=', 'users.id')
            ->get(['users.first_name', 'users.last_name', 'users.id as user_id', 'goal_users.goal_number']);

        foreach ($goalUsers as $user) {
            $user_name = $user->first_name . ' ' . $user->last_name;
            $goalNumber = $user->goal_number;
            $user_id = $user->user_id;

            $users[] = [
                'user_name' => $user_name,
                'goal_number' => $goalNumber,
                'user_id' => $user_id,
                'assigned' => true, // Mark users as assigned
            ];
        }

        // Fetch unassigned users
        $unassignedUsers = User::whereNotIn('id', $goalUsers->pluck('user_id')->toArray())
            ->where('role', '<>', 1)
            ->get();

        foreach ($unassignedUsers as $user) {
            $user_name = $user->first_name . ' ' . $user->last_name;
            $user_id = $user->id;

            $users[] = [
                'user_name' => $user_name,
                'user_id' => $user_id,
                'assigned' => false, // Mark users as unassigned
            ];
        }

        return $users;
    }



    public function createGoal(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'dates' => 'required|string',
//            'reward' => 'required|string|min:0',
//            'bonusGoal' => 'required|numeric|min:0',
//            // Add more validation rules as needed
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
        $dates = $request->dates;
        $reward = $request->reward;
        $repeat = $request->repeat;
        $goal_user = $request->goal_user;
        $goal_number = $request->goal_number;
        $goal_user_id = $request->goal_user_id;
        $bonusGoal = $request->bonusGoal;

        if (!Str::contains($dates, ' to ')) {
            return redirect()->route('admin.goal')->with('alert', [
                'type' => 'error',
                'message' => 'Select dates for the goal'
            ]);
        }

        $dateArr = explode(" to ", $dates);
        $starts = $dateArr[0];
        $ends = $dateArr[1];
        $start_date = Carbon::createFromFormat('d-m-Y', $starts);
        $end_date = Carbon::createFromFormat('d-m-Y', $ends);

        $days_difference = $end_date->diffInDays($start_date);

        // Create and save the initial goal
        $goal = new AdminGoal();
        $goal->start_date = Carbon::parse($start_date);
        $goal->end_date = Carbon::parse($end_date);
        $goal->reward = $reward;
        $goal->bonus = $bonusGoal;
        // Check if $repeat is null, and set it to a default value if needed
        if ($repeat === null) {
            $goal->repeat = 3; // or any other default value you want
        } else {
            $goal->repeat = $repeat;
        }
        $goal->status = 1;
        $goal->save();

        foreach ($goal_user as $i => $user) {
            $goalUser = new GoalUser();
            $goalUser->goal_id = $goal->id;
            $goalUser->user_id = $goal_user_id[$i];
            $goalUser->goal_number = $goal_number[$i];
            $goalUser->save();
        }

        if ($repeat === 'weekly') {
            // Calculate and save goals for the same number of days in the future
            $currentEndDate = $end_date;

            for ($day = 1; $day <= $days_difference; $day++) {
                $newStartDate = $currentEndDate->copy()->addDay();
                $newEndDate = $newStartDate->copy()->addDays($days_difference);

                // Create and save a new goal for each day
                $newGoal = new AdminGoal();
                $newGoal->start_date = Carbon::parse($newStartDate);
                $newGoal->end_date = Carbon::parse($newEndDate);
                $newGoal->reward = $reward;
                $newGoal->bonus = $bonusGoal;
                // Check if $repeat is null, and set it to a default value if needed
                if ($repeat === null) {
                    $newGoal->repeat = 3; // or any other default value you want
                } else {
                    $newGoal->repeat = $repeat;
                }
                $newGoal->status = 1;
                $newGoal->save();

                foreach ($goal_user as $i => $user) {
                    $goalUser = new GoalUser();
                    $goalUser->goal_id = $newGoal->id;
                    $goalUser->user_id = $goal_user_id[$i];
                    $goalUser->goal_number = $goal_number[$i];
                    $goalUser->save();
                }

                // Update current end date for the next iteration
                $currentEndDate = $newEndDate;
            }
        } elseif ($repeat === 'monthly') {
            // Calculate and save goals for the same date range in the next three months
            for ($monthOffset = 1; $monthOffset <= 3; $monthOffset++) {
                $newStartDate = $start_date->copy()->addMonths($monthOffset);
                $newEndDate = $end_date->copy()->addMonths($monthOffset);

                // Create and save a new goal for each month
                $newGoal = new AdminGoal();
                $newGoal->start_date = Carbon::parse($newStartDate);
                $newGoal->end_date = Carbon::parse($newEndDate);
                $newGoal->reward = $reward;
                $newGoal->bonus = $bonusGoal;
                $newGoal->repeat = $repeat;
                $newGoal->status = 1;
                $newGoal->save();

                foreach ($goal_user as $i => $user) {
                    $goalUser = new GoalUser();
                    $goalUser->goal_id = $newGoal->id;
                    $goalUser->user_id = $goal_user_id[$i];
                    $goalUser->goal_number = $goal_number[$i];
                    $goalUser->save();
                }
            }
        }

        return redirect()->route('admin.goal')->with('alert', [
            'type' => 'success',
            'message' => 'Goals have been created.'
        ]);
    }

    //    public function showActiveGoals() {
    //        $currentDate = Carbon::now();
    //
    //        $activeGoals = AdminGoal::where('end_date', '>=', $currentDate->format('Y-m-d'))
    //            ->get();
    //
    //        $activeGoalsWithUserData = $activeGoals->map(function ($goal) {
    //            $goalUser = GoalUser::where('goal_id', $goal->id)->first();
    //            $user = User::find($goalUser->user_id);
    //
    //            $goal->user_name = $user->name;
    //            $goal->goal_number = $goalUser->goal_number;
    //            return $goal;
    //        });
    //
    //        return view('active_goals', ['activeGoals' => $activeGoalsWithUserData]);
    //    }

    public function endGoal($id)
    {
        $goal = AdminGoal::findOrFail($id);
        $goal->status = 0;
        $goal->save();
        //        dd($id);

        return redirect()->route('admin.goal')->with('alert', [
            'type' => 'success',
            'message' => 'Goal have been ended.'
        ]);
    }



    public function activeGoal()
    {
        $currentDate = now()->toDateString(); // Assuming Carbon is already imported or aliased

        $goal = AdminGoal::where('status', 1)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        $userTargetsInfo = [];

        if ($goal) {
            foreach ($goal->users as $user) {
                // Get user targets for the current goal
                $userTargets = GoalUserTarget::where('user_id', $user->user_id)
                    ->where('goal_id', $goal->id)
                    ->get();

                if ($userTargets) {
                    // Stats calculation
                    $completed = $userTargets->count();
                    $total = GoalUser::where('goal_id', $goal->id)->where('user_id', $user->user_id)->first()->goal_number;
                    $incomplete = max($total - $completed, 0);
                    $extra = max($completed - $total, 0);

                    // Stats array
                    $stats = [
                        'completed' => rtrim(number_format((float) (($completed * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                        'bonus' => rtrim(number_format((float) (($extra * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                        'incomplete' => rtrim(number_format((float) (($incomplete * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                    ];
                } else {
                    $stats = [
                        'completed' => 0,
                        'bonus' => 0,
                        'incomplete' => 0,
                    ];
                }


                // Build user targets info array
                $userTargetsInfo[] = [
                    'user_id' => $user->user_id,
                    'name' => User::find($user->user_id)->first_name . " " . User::find($user->user_id)->last_name,
                    'stats' => $stats,
                ];
            }

            // Sort the userTargetsInfo array based on the sum of completed and bonus stats
            usort($userTargetsInfo, function ($a, $b) {
                $aStatsSum = $a['stats']['completed'] + $a['stats']['bonus'];
                $bStatsSum = $b['stats']['completed'] + $b['stats']['bonus'];
                return $bStatsSum <=> $aStatsSum; // Sort in descending order
            });
        }

        // Now $userTargetsInfo contains the sorted array of user information and stats
        // dd($userTargetsInfo);

        return view('admin.Admin-active-goal', compact('goal', 'userTargetsInfo'));
    }
    public function currentGoal()
    {
        return view('admin.Admin-current-goal');
    }
    public function detailsGoal()
    {
        return view('admin.Active-goal-details');
    }


    public function updateGoal(Request $request, $goal_id)
    {
        $goal = AdminGoal::findOrFail($goal_id);
        $dates = $request->dates;
        $reward = $request->reward;
        $repeat = $request->repeat;
        $goal_user = $request->goal_user;
        $goal_number = $request->goal_number;
        $bonusGoal = $request->bonus;

        if (!Str::contains($dates, ' to ')) {
            return redirect()->route('admin.goal')->with('alert', [
                'type' => 'error',
                'message' => 'Select valid dates for the goal'
            ]);
        }

        $dateArr = explode(" to ", $dates);
        $starts = $dateArr[0];
        $ends = $dateArr[1];
        $start_date = Carbon::createFromFormat('d-m-Y', $starts);
        $end_date = Carbon::createFromFormat('d-m-Y', $ends);

        // Update goal attributes
        $goal->start_date = Carbon::parse($start_date);
        $goal->end_date = Carbon::parse($end_date);
        $goal->reward = $reward;
        $goal->bonus = $bonusGoal;

        // Check if $repeat is null, and set it to a default value if needed
        if ($repeat === null) {
            $goal->repeat = 3; // or any other default value you want
        } else {
            $goal->repeat = $repeat;
        }

        $goal->status = 1;
        $goal->save();

        // Update goal_number in GoalUsers table
        foreach ($goal_user as $jsonKey => $checked) {
            $key = json_decode($jsonKey);

            $user_id = $key->id;

            $goalUser = GoalUser::where('goal_id', $goal_id)
                ->where('user_id', $user_id)
                ->first();
            //            $validator = Validator::make($request->all(), [
            //                'goal_user' => 'required|array',
            //                'goal_number' => 'required|array',
            //                'goal_number.*' => 'required|numeric', // Validate each goal_number field
            //                // ... other validation rules
            //            ]);
            //
            //            if ($validator->fails()) {
            //                return redirect()->back()
            //                    ->withErrors($validator)
            //                    ->withInput();
            //            }


            if ($checked) {
                if ($goalUser) {
                    $goalUser->goal_number = $goal_number[$user_id];
                    $goalUser->save();
                } else {
                    GoalUser::create([
                        'goal_id' => $goal_id,
                        'user_id' => $user_id,
                        'goal_number' => $goal_number[$user_id]
                    ]);
                }
            }
            //            else {
            //                if ($goalUser) {
            //                    dd($goalUser->id);
            //                    $gu = GoalUser::find($goalUser->id);
            //                    $goalUser->delete(); // Remove user's association when unchecked
            //                }
            //            }
        }

        $goalUsers = GoalUser::where('goal_id', $goal_id)->get();


        $goalUserIds = [];
        $unassigned = [];

        // Create a set of goal_user ids for faster lookup
        foreach ($goal_user as $key => $gu) {
            $keyObject = json_decode($key);
            if (isset($keyObject->id)) {
                $goalUserIds[$keyObject->id] = true;
            }
        }

        // Find unassigned user IDs
        foreach ($goalUsers as $goalUser) {
            if (!isset($goalUserIds[$goalUser->user_id])) {
                $unassigned[] = $goalUser->user_id;
            }
        }

        // Delete unassigned goal users in one query
        if (!empty($unassigned)) {
            GoalUser::where('goal_id', $goal_id)->whereIn('user_id', $unassigned)->delete();
        }


        return redirect()->route('admin.goal')->with('alert', [
            'type' => 'success',
            'message' => 'Goal has been updated.'
        ]);
    }

    public function updateUpcomingGoal(Request $request, $goal_id)
    {
        $goal = AdminGoal::findOrFail($goal_id);
        $dates = $request->dates;
        $reward = $request->reward;
        $repeat = $request->repeat;
        $goal_user = $request->goal_user;
        $goal_number = $request->goal_number;
        $goal_user_id = $request->goal_user_id;
        $bonusGoal = $request->bonus;

        if (!Str::contains($dates, ' to ')) {
            return redirect()->route('admin.goal')->with('alert', [
                'type' => 'error',
                'message' => 'Select valid dates for the goal'
            ]);
        }

        $dateArr = explode(" to ", $dates);
        $starts = $dateArr[0];
        $ends = $dateArr[1];
        $start_date = Carbon::createFromFormat('d-m-Y', $starts);
        $end_date = Carbon::createFromFormat('d-m-Y', $ends);

        // Update goal attributes
        $goal->start_date = Carbon::parse($start_date);
        $goal->end_date = Carbon::parse($end_date);
        $goal->reward = $reward;
        $goal->bonus = $bonusGoal;
        // Check if $repeat is null, and set it to a default value if needed
        if ($repeat === null) {
            $goal->repeat = 3; // or any other default value you want
        } else {
            $goal->repeat = $repeat;
        }

        $goal->status = 1;
        $goal->save();

        // Update goal_number in GoalUsers table


        $goalUsers = GoalUser::where('goal_id', $goal_id)->get();


        foreach ($goal_user as $i => $user) {
            foreach ($goalUsers as $goalUser) {
                $key = json_decode($i);
                if ($key == $goalUser->user_id) {
                    $goalUser->user_id;
                    $goalUser->goal_number = $goal_number[$key];
                    $goalUser->save();
                }
            }
        }
        $goalUsers = GoalUser::where('goal_id', $goal_id)->get();
        //        $validator = Validator::make($request->all(), [
        //            'goal_user' => 'required|array',
        //            'goal_number' => 'required|array',
        //            'goal_number.*' => 'required|numeric', // Validate each goal_number field
        //            // ... other validation rules
        //        ]);
        //
        //        if ($validator->fails()) {
        //            return redirect()->back()
        //                ->withErrors($validator)
        //                ->withInput();
        //        }

        foreach ($goal_user as $i => $user) {
            $key = json_decode($i);
            $goalUser = $goalUsers->where('user_id', $key)->first(); // Find existing goalUser

            if ($goalUser) {
                $goalUser->goal_number = $goal_number[$key];
                $goalUser->save();
            } else {
                GoalUser::create([
                    'goal_id' => $goal_id,
                    'user_id' => $key,
                    'goal_number' => $goal_number[$key]
                ]);
            }
        }

        // Handle assignment of other users
        //        dd($goal_user_id);
        $goalUsers = GoalUser::where('goal_id', $goal_id)->get();
        $goalUserIds = [];
        $unassigned = [];

        // Create a set of goal_user ids for faster lookup
        foreach ($goal_user as $key => $gu) {
            $keyObject = json_decode($key);
            if (isset($keyObject)) {
                $goalUserIds[$keyObject] = true;
            }
        }

        // Find unassigned user IDs
        foreach ($goalUsers as $goalUser) {
            if (!isset($goalUserIds[$goalUser->user_id])) {
                $unassigned[] = $goalUser->user_id;
            }
        }

        // Delete unassigned goal users in one query
        if (!empty($unassigned)) {
            GoalUser::where('goal_id', $goal_id)->whereIn('user_id', $unassigned)->delete();
        }
        return redirect()->route('admin.goal')->with('alert', [
            'type' => 'success',
            'message' => 'Goal has been updated.'
        ]);
    }

    public function AdminAnimation()
    {
        return view('celebration-animation.Admin-anim');
    }

    public function goalCompleted(AdminGoal $goal) {
        $completed = $goal->stats()['completed_percentage'] + $goal->stats()['bonus_percentage'];

        return response()->json([
            'completed' => $completed,
        ]);
    }
    public function getActiveGoalStats(){
        $currentDate = now()->toDateString(); // Assuming Carbon is already imported or aliased

        $goal = AdminGoal::where('status', 1)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        $userTargetsInfo = [];

        if ($goal) {
            foreach ($goal->users as $user) {
                // Get user targets for the current goal
                $userTargets = GoalUserTarget::where('user_id', $user->user_id)
                    ->where('goal_id', $goal->id)
                    ->get();

                if ($userTargets) {
                    // Stats calculation
                    $completed = $userTargets->count();
                    $total = GoalUser::where('goal_id', $goal->id)->where('user_id', $user->user_id)->first()->goal_number;
                    $incomplete = max($total - $completed, 0);
                    $extra = max($completed - $total, 0);

                    // Stats array
                    $stats = [
                        'completed' => rtrim(number_format((float) (($completed * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                        'bonus' => rtrim(number_format((float) (($extra * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                        'incomplete' => rtrim(number_format((float) (($incomplete * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                    ];
                } else {
                    $stats = [
                        'completed' => 0,
                        'bonus' => 0,
                        'incomplete' => 0,
                    ];
                }


                // Build user targets info array
                $userTargetsInfo[] = [
                    'user_id' => $user->user_id,
                    'goal_id' => $goal->id,
                    'name' => User::find($user->user_id)->first_name . " " . User::find($user->user_id)->last_name,
                    'stats' => $stats,
                ];
            }

            // Sort the userTargetsInfo array based on the sum of completed and bonus stats and their updated at, the earlier the updated at with sum 100% the higher it is
            usort($userTargetsInfo, function ($a, $b) {
                $aStatsSum = $a['stats']['completed'] + $a['stats']['bonus'];
                $bStatsSum = $b['stats']['completed'] + $b['stats']['bonus'];
                return $bStatsSum <=> $aStatsSum; // Sort in descending order
            });

        //     usort($userTargetsInfo, function ($a, $b) {
        //         $aStatsSum = $a['stats']['completed'] + $a['stats']['bonus'];
        //         $bStatsSum = $b['stats']['completed'] + $b['stats']['bonus'];
        //         $aUpdatedAt = GoalUserTarget::where('user_id', $a['user_id'])
        //             ->where('goal_id', $a['goal_id'])
        //             ->orderBy('updated_at', 'asc')
        //             ->first();
        //         $bUpdatedAt = GoalUserTarget::where('user_id', $b['user_id'])
        //             ->where('goal_id', $b['goal_id'])
        //             ->orderBy('updated_at', 'asc')
        //             ->first();
        //         return $bStatsSum <=> $aStatsSum && $aUpdatedAt <=> $bUpdatedAt; // Sort in descending order
        //     });
        // }
        

        // dd($userTargetsInfo);

        $goal->end_date = date('d-m-Y', strtotime($goal->end_date));

        return response()->json([
            'goal' => $goal,
            'goalStats' => $goal->stats(),
            'userTargetsInfo' => $userTargetsInfo,
        ]);
    }

}
}
