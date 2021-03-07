<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Carbon\Carbon;

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
}
