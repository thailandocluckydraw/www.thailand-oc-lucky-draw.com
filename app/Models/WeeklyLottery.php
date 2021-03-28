<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyLottery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lottery_number'
    ];

    public static function addWeeklyLottery($data) {
        self::create($data);
    }

    public static function updateWeeklyLottery($users_id, $data)
    {
        self::where('users_id', $users_id)->update( $data);
    }

    public static function viewTodayWeeklyLottery($today) {
        $data = WeeklyLottery::whereDate('created_at', $today)->get();        
        return $data;
    }

    public static function viewWeeklyLottery() {
        $data = WeeklyLottery::orderBy('created_at', 'desc')->get();
        return $data;
    }
}
