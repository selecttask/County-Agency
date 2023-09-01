<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalUser extends Model
{
    use HasFactory;
    protected $fillable = ['goal_id', 'user_id', 'goal_number'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function goal() {
        return $this->belongsTo(AdminGoal::class, 'goal_id');
    }

    public function targets() {
        return $this->hasMany(GoalUserTarget::class, 'goal_user_id');
    }

    public function stats() {
        $cp = 0;
        $bn = 0;
        $totalBonus = $this->goal->bonus;
        $total = $this->goal_number;
        $completed = $this->targets()->count();

        $remaining = $total - $completed;

        $extra = 0;
        if($remaining < 0) {
            $extra = $completed - $total;
            $bn = ($extra *100)/$totalBonus;
            if($bn > 100) {
                $bn =100;
            }
            $cp = 100;
        }else{
            $cp = ($completed * 100) / $total;
        }

        return [
            'bonus_percentage' => rtrim(rtrim(number_format((float) $bn, 2), '0'), '.') ,
            'incompleted_percentage' => rtrim(rtrim(number_format((float) (100 - $cp), 2), '0'), '.') ,
            'completed_percentage' => rtrim(rtrim(number_format((float) $cp, 2), '0'), '.') ,
        ];

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
