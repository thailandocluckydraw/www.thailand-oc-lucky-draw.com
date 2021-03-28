<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Lottery;
use App\Models\WeeklyLottery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $dataWeek = WeeklyLottery::viewTodayWeeklyLottery($today);
        return view('home')->with(["data" => $data, "dataWeek" => $dataWeek]);
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

    public function saveLotteryWeekly(Request $request){
        $validatedData = $request->validate([
            'lottery_number_week' => 'required|numeric|digits:10'
        ]);

        $todaysLottery = WeeklyLottery::whereDate('created_at', Carbon::today())->count();
        
        if ($todaysLottery < 2) {
            $data = [
                'lottery_number' => $request->lottery_number_week
            ];
            WeeklyLottery::addWeeklyLottery($data);
            return redirect()->back()->with("success","Lottery number released successfully !");
        } else {
            return redirect()->back()->with("error","2 Lottery numbers already released !");
        }        
    }

    /**
     * Display change password page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChangePasswordForm(){
        return view('admin.change-password');
    }

    /**
     * Change password
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:5|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }
}
