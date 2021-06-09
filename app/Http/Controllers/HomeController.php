<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Subscription;

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
        if (Auth::user()->type == "Admin") {     
        return view('admin.dashboard');
        }else{
            // $recomandation = CreateSubscription::where('status', 1)->get();
            $plan = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
            return view('user.dashboard')->with(compact('plan')); 
        }
    }
}
