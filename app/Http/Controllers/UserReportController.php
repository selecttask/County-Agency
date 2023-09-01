<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\GoalUser;
use App\Models\AdminGoal;
use Illuminate\Http\Request;
use App\Models\GoalUserTarget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserReportController extends Controller
{
    // public function userReport()
    // {
    //     $userGoals = [];
    //     $goals = GoalUser::where('user_id', auth()->id())->get();

    //     $currentDate = Carbon::now();
    //     $userGoalIds = $goals->pluck('goal_id');

    //     $adminGoals = AdminGoal::whereIn('id', $userGoalIds)
    //         ->where(function ($query) use ($currentDate) {
    //             $query->where('end_date', '<', $currentDate->format('Y-m-d'))
    //                 ->orWhere('status', '=', 0);
    //         })
    //         ->get();

    //     $userGoals = $adminGoals;
    //     // dd($userGoals);
    //     return view('user.User-report', compact('userGoals'));
    // }

    public function userReport()
    {
        $goals = GoalUser::where('user_id', auth()->id())->get();

        $currentDate = Carbon::now();
        $userGoalIds = $goals->pluck('goal_id');

        $userGoals = AdminGoal::whereIn('id', $userGoalIds)
            ->where(function ($query) use ($currentDate) {
                $query->where('end_date', '<', $currentDate->format('Y-m-d'))
                    ->orWhere('status', '=', 0);
            })
            ->paginate(5); // Adjust the pagination limit as needed

        $goalId = $userGoals->pluck('id');

        $lastUpdates = [];

        foreach ($goalId as $id) {
            $latestGoalUserTarget = GoalUserTarget::where('goal_id', $id)
                ->latest('updated_at')
                ->first();

            $lastUpdate = $latestGoalUserTarget ? $latestGoalUserTarget->last_update : '00-00-0000';
            $lastUpdates[] =  [
                'goal_id' => $id,
                'updatedTime' => $lastUpdate
            ];
        }

        return view('user.User-report', compact('userGoals', 'lastUpdates'));
    }


    public function userReportDetails($id)
    {

        $currentDate = Carbon::now()->toDateString();

        $goal = AdminGoal::where('id', $id)->first();

        if ($goal && $goal->users->contains('user_id', auth()->user()->id)) {
            //get user target
            $ugts = GoalUserTarget::where('user_id', auth()->user()->id)->where('goal_id', $id)->get();
            //stats
            //completed
            $completed = $ugts->count();
            //total
            $total = $goal->currentUserGoalUser()->goal_number;
            //incomplete
            $incomplete = $total - $completed;
            $extra = 0;
            if ($incomplete < 0) {
                $extra = $completed - $total;
                $incomplete = 0;
            }

            //stats
            $stats = [
                'completed' => rtrim(number_format((float) (($completed * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                'bonus' => rtrim(number_format((float) (($extra * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                'incomplete' => rtrim(number_format((float) (($incomplete * 100) / ($completed + $extra + $incomplete)), 2), '0'),
            ];

            $recruitDetails = GoalUserTarget::where('goal_id', $id)->paginate(7);

            // dd($goalDetails);

            return view('user.User-report-details', compact('recruitDetails', 'stats', 'goal'));
        }
    }
}
