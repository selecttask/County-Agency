<?php

use App\Http\Controllers\AdminGoalController;
use App\Http\Controllers\GoalUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\UserReportController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Check if remember me cookie is present
    // dd(request()->cookie('remember_me'));
    if(!is_null(request()->cookie('remember_me'))) {
        $rememberToken = request()->cookie('remember_me');
        $user = User::where('remember_token', $rememberToken)->first();

        if ($user) {
            return view('auth/login', ['rememberedEmail' => $user->email, 'rememberedPassword' => $user->password]);
        }
    }

    return view('auth/login');
})->middleware('guest')->name('login');

Route::post('/', [UserController::class, 'loginUser'])->name('loginUser');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/update-profile-password', [UserController::class, 'updateProfilePassword'])->name('admin.updateProfilePassword');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    //users

    Route::post('/create-user', [UserController::class, 'createUser'])->name('admin.createUser');
    Route::post('/update-user', [UserController::class, 'updateUser'])->name('admin.updateUser');
    Route::post('/update-user-password', [UserController::class, 'updateuserPassword'])->name('admin.updateuserPassword');
    Route::get('/update-user-status/{user_id}/{status}', [UserController::class, 'updateUserStatus'])->name('admin.updateUserStatus');
    Route::get('/delete-user/{user_id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');

    //goals
    Route::get('/goals', [AdminGoalController::class, 'index'])->name('admin.goal');
    Route::post('/create-goals', [AdminGoalController::class, 'createGoal'])->name('admin.createGoal');
    Route::get('/current-goal', [AdminGoalController::class, 'currentGoal'])->name('admin.currentGoal');
    Route::get('/goal-details', [AdminGoalController::class, 'detailsGoal'])->name('admin.detailsGoal');
    Route::get('/end-goal/{id}', [AdminGoalController::class, 'endGoal'])->name('admin.endGoal');
    Route::put('/admin/goals/{goal_id}', [AdminGoalController::class, 'updateGoal'])->name('admin.updateGoal');
    Route::put('/admin/goalsUpcoming/{goal_id}', [AdminGoalController::class, 'updateUpcomingGoal'])->name('admin.updateUpcomingGoal');

    Route::get('/user-goal/{id}/{userId}/{goalId}', [GoalUserController::class, 'single'])->name('admin.userGoal');

    //reports
    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.report');
    Route::get('/reports-info/{id}', [AdminReportController::class, 'reportInfo'])->name('admin.reportInfo');
    Route::get('/reports-details/{id}/{userId}/{goalId}', [AdminReportController::class, 'reportDetails'])->name('admin.reportDetails');

    //active goal
    Route::get('/active-goal', [AdminGoalController::class, 'activeGoal'])->name('admin.activeGoal');

    Route::get('/adminanimation', [AdminGoalController::class, 'AdminAnimation'])->name('admin.animation');
    Route::get('/goal/completed/{goal}', [AdminGoalController::class, 'goalCompleted'])->name('admin.goalCompleted');
    Route::get('/goal/active/stats', [AdminGoalController::class, 'getActiveGoalStats'])->name('admin.goalActiveStats');

});



Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/user-goal', [UserGoalController::class, 'goal'])->name('user.goal');
    Route::get('/user-active-goal', [GoalUserController::class, 'userActiveGoal'])->name('user.activeGoal');

    Route::post('/create-target', [UserGoalController::class, 'createTarget'])->name('user.createTarget');
    //    Route::get('/user-profile', [UserGoalController::class, 'profile'])->name('user.profile');
    Route::get('/user-report', [UserReportController::class, 'userReport'])->name('user.reports');

    Route::get('/user-report-details/{id}', [UserReportController::class, 'userReportDetails'])->name('user.reportDetails');
    // Route::get('/user-report-details', [UserReportController::class, 'userReportDetails'])->name('user.reportDetails');

    Route::post('/goals/{id}', [UserGoalController::class, 'update'])->name('goals.update');

    Route::get('/animation', [UserGoalController::class, 'ShowAnimation'])->name('show.animation');

});
