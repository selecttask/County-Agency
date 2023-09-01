<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminGoal extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(GoalUser::class, 'goal_id');
    }

    public function currentUserGoalUser()
    {
        return $this->users()->where('user_id', auth()->id())->first();
    }

    public function targets() {
        return $this->hasMany(GoalUserTarget::class, 'goal_id');
    }

    public function stats() {
        $totalGoals = $this->users->sum('goal_number');
        $completed = $this->targets()->count();
        $bonus = $this->bonus;

        $cp = 0; // Default value to handle potential division by zero
        $bp = 0;

        if ($totalGoals > 0) { // Check if $totalGoals is greater than zero to avoid division by zero
            $cp = ($completed * 100) / $totalGoals;
            $cp = ($cp > 100) ? 100 : $cp;

            if ($completed > $totalGoals) {
                $extra = $completed - $totalGoals;
                if ($bonus > 0) { // Check if $bonus is greater than zero to avoid division by zero
                    $ep = ($extra * 100) / $bonus;
                    $bp = $ep > 100 ? 100 : $ep;
                }
            }
        }

        return [
            'completed_percentage' => rtrim(rtrim(number_format((float) $cp, 2), '0'), '.') ,
            'incompleted_percentage' => rtrim(rtrim(number_format((float) (100 - $cp), 2), '0'), '.') ,
            'bonus_percentage' => rtrim(rtrim(number_format((float) $bp, 2), '0'), '.') ,
        ];

    }

}
