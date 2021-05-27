<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\CreateSubscription;

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
            $recomandation = CreateSubscription::where('status', 1)->get();
            return view('user.index')->with(compact('recomandation')); 
        }
    }
}
