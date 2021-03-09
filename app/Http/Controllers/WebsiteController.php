<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

class WebsiteController extends Controller
{
    /**
     * Show the application landing page.
     *
     */
    public function index()
    {
        $today = Carbon::today();
        $data = Lottery::viewTodayLottery($today);
        return view('website.landing-page')->with("data", $data);
    }

    
    /**
     * Show the application lottery result page.
     *
     */
    public function lotteryResults()
    {
        $data = Lottery::viewLottery();
        return view('website.lottery-result-page')->with("data", $data);
    }

    
    /**
     * Show the application contact page.
     *
     */
    public function contactUs()
    {
        return view('website.contact-page');
    }

    public function generateLottery()
    {
        $begin = new DateTime('2021-01-01');
        $end = new DateTime('2021-03-10');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        
        foreach ($period as $dt) {
            $lotterynumber1 = rand(1000000000,9999999999);
            $addLottery = new Lottery;
            $addLottery->lottery_number = $lotterynumber1;
            $addLottery->created_at = $dt->format("Y-m-d 12:55:00");
            $addLottery->updated_at = $dt->format("Y-m-d 12:55:00");
            $addLottery->save();

            
            $lotterynumber2 = rand(1000000000,9999999999);
            $addLottery = new Lottery;
            $addLottery->lottery_number = $lotterynumber2;
            $addLottery->created_at = $dt->format("Y-m-d 17:55:00");
            $addLottery->updated_at = $dt->format("Y-m-d 17:55:00");
            $addLottery->save();
        }
        echo "success";
    }
}
