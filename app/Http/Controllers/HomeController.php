<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Lottery;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $data = Lottery::viewTodayLottery($today);
        return view('home')->with("data", $data);
    }

    public function saveLottery(Request $request){
        $validatedData = $request->validate([
            'lottery_number' => 'required|numeric|digits:10'
        ]);

        $todaysLottery = Lottery::whereDate('created_at', Carbon::today())->count();
        
        if ($todaysLottery < 2) {
            $data = [
                'lottery_number' => $request->lottery_number
            ];
            Lottery::addLottery($data);
            return redirect()->back()->with("success","Lottery number released successfully !");
        } else {
            return redirect()->back()->with("error","2 Lottery numbers already released !");
        }        
    }
}
