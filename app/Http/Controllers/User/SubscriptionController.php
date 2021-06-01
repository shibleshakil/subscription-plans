<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CreateSubscription;
use App\Models\Subscription;
use App\Models\User;
Use \Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;

use Auth;

class SubscriptionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $recomandation = CreateSubscription::where('status', 1)->inRandomOrder()->get();
        return view('user.subscriptions.index')->with(compact('recomandation'));
    }

    public function userSubAdd(Request $request){
        $test = $request->price;
        $price = (float) $test;
        if(Subscription::where('user_id', Auth()->User()->id)->where('status', 1)->exists()){
            return redirect()->route('home')->with('error', 'Already have a subscription');
        }else{
            if(User::find(Auth()->user()->id)->balance < $price){
                return redirect()->route('home')->with('error', 'Insuficent Balance! Please Desite');
              }else{
                $data = new Subscription;
                $data->user_id = Auth()->User()->id;
                $data->create_subscription_id = $request->id;
                $data->active_date = Carbon::now()->toDateTimeString();
                $data->maturity_exp = date('Y-m-d H:m:s',strtotime( $request->maturity_date . ' day'));
                $data->maturity_left = Carbon::now()->diffInDays($data->maturity_exp, false);
                DB::beginTransaction();
                try{
                    if($data->save()){
                        $trs = User::find(Auth()->user()->id);
                        $trs->decrement('balance',$price);
                        DB::commit();
                        $trs->save();
                        return redirect()->route('user-subscriptions-list')->with('success', 'New Subscription Added Successfully!');
                    }
                }catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->route('home')->with('error', $e->getMessage());
                }
                
            }
        }
    }

    public function userSubCancel(Request $request){
        DB::beginTransaction();
        try {
            $data = Subscription::find($request->id);
            $data->cancel_date = Carbon::now()->toDateTimeString();
            $data->status = 0;
            // dd($data);
            if($data->save()){
                DB::commit();
                return redirect()->route('user-subscriptions-list')->with('success', 'Your Subscription Canceled Successfully!');
            }else{
                DB::rollback();
                return redirect()->route('user-subscriptions-list')->with('errors', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user-subscriptions-list')->with('error', $e->getMessage());
        }
    }

    public function userSubList(){
        $data = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->get();
        return view('user.subscriptions.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
