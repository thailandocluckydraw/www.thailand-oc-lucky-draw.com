<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lottery_number'
    ];

    public static function addLottery($data) {
        self::create($data);
    }

    public static function updateLottery($users_id, $data)
    {
        self::where('users_id', $users_id)->update( $data);
    }

    public static function viewTodayLottery($today) {
        $data = Lottery::whereDate('created_at', $today)->get();        
        return $data;
    }

    public static function viewLottery() {
        $data = Lottery::orderBy('created_at', 'desc')->get();
        return $data;
    }
}
