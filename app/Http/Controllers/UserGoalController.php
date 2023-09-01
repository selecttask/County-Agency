<?php

namespace App\Http\Controllers;

use App\Models\AdminGoal;
use App\Models\GoalUserTarget;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserGoalController extends Controller
{
    public function goal() {
        $currentDate = Carbon::now()->toDateString();

        $goal = AdminGoal::where('status', 1)
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        if($goal && $goal->users->contains('user_id', auth()->user()->id)) {
            //get user target
            $ugts = GoalUserTarget::where('user_id', auth()->user()->id)->where('goal_id', $goal->id)->paginate(4);
            //stats
            //completed
            $completed = $ugts->total();
            //total
            $total = $goal->currentUserGoalUser()->goal_number;
            //incomplete
            $incomplete = $total - $completed;
            $extra = 0;
            if($incomplete < 0) {
                $extra = $completed - $total;
                $incomplete = 0;
            }
            //stats
            $stats = [
                'completed' => rtrim(number_format((float) (($completed * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                'bonus' => rtrim(number_format((float) (($extra * 100) / ($completed + $extra + $incomplete)), 2), '0'),
                'incomplete' => rtrim(number_format((float) (($incomplete * 100) / ($completed + $extra + $incomplete)), 2), '0'),
            ];

            $completed = $stats['completed'] + $stats['bonus'] == 100 ? true : false;

            // dd($completed);

            return view('user.goal', compact('goal', 'ugts', 'stats', 'completed'));
            // return view('user.goal', compact('goal', 'ugts', 'stats'));
        }else{
            return view('user.no-goal');
        }
    }

    public function createTarget(Request $request) {
        $formattedDate = $request->last_update;
        // dd($formattedDate);
        // $formattedDate = Carbon::createFromFormat('d/m/Y', $request->last_update)->format('Y-m-d');
        $ugt = new GoalUserTarget();
        $ugt->goal_id = $request->goal_id;
        $ugt->goal_user_id = $request->goal_user_id;
        $ugt->user_id = auth()->user()->id;
        $ugt->recruit_name = $request->recruit_name;
        $ugt->last_update = $formattedDate;

        $ugt->save();

        return redirect()->back();
    }

    public function update(Request $request, GoalUserTarget $id)
    {
        // Validate the input data
        $request->validate([
            'recruit_name' => 'required',
            'last_update' => 'required'
        ]);

        // Update the data
        $id->update([
            'recruit_name' => $request->recruit_name,
            'last_update' => $request->last_update
        ]);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
    public function ShowAnimation()
{
    // Check if the animation has been shown before
    if (!session()->has('animationShown')) {

        // Set session variable to indicate that animation has been shown
        session(['animationShown' => true]);

    }

    // Other logic and rendering
    return view('celebration-animation.index');
}

}
