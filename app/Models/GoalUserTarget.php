<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalUserTarget extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
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
        $completed = $this->targets()->total();
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
            'incompleted_percentage' => rtrim(rtrim(number_format((float) (100 - $cp), 2), '0'), '.'),
            'bonus_percentage' => rtrim(rtrim(number_format((float) $bp, 2), '0'), '.') ,
        ];


    }

    protected $fillable = [
        'recruit_name', // Add any other fields that are fillable
        'last_update'
    ];

//    public function stats() {
//        $cp = 0;
//        $bn = 0;
//        $totalBonus = $this->goal->bonus;
//        $total = $this->goal_number;
//        $completed = $this->targets()->count();
//
//        $remaining = $total - $completed;
//
//        $extra = 0;
//        if($remaining < 0) {
//            $extra = $completed - $total;
//            $bn = ($extra *100)/$totalBonus;
//            if($bn > 100) {
//                $bn =100;
//            }
//            $cp = 100;
//        }else{
//            $cp = ($completed * 100) / $total;
//        }
//
//        return [
//            'bonus_percentage' => $bn,
//            'completed_percentage' => $cp
//        ];
//    }
}
