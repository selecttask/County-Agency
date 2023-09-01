<?php

namespace App\Http\Controllers;

use App\Models\AdminGoal;
use App\Models\GoalUser;
use App\Models\GoalUserTarget;
use App\Models\User;
use Illuminate\Http\Request;

class GoalUserController extends Controller
{
    public function single($id, $userId, $goalId)
    {
        $recruitDetails = GoalUserTarget::where('goal_user_id', $id)
            ->where('goal_id', $goalId)
            ->paginate(5);

        $goal = GoalUser::where('goal_id', $goalId)->where('user_id', $userId)->first();

        $stats = $goal->stats();
        $user = User::where('id', $userId)->first();
        $upcomingGoal = AdminGoal::where('id', $goalId)->first();

        return view('admin.user-goal', compact('recruitDetails', 'user', 'upcomingGoal', 'stats'));

//        return view('admin.Report-details', compact('recruitDetails', 'user', 'upcomingGoal', 'stats'));

    }
    public function userActiveGoal(){
        return view('user.User-active-goal');
    }
}
