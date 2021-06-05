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

    public function paymentDetails(Request $request) {   
        $recomandation = CreateSubscription::where('id', $request->id)->first();
        return view('user.subscriptions.paymentPage')->with(compact('recomandation'));
    }

    public function upgradePaymentDetails(Request $request) {   
        $recomandation = CreateSubscription::where('id', $request->id)->first();
        $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
        return view('user.subscriptions.upgradePaymentPage')->with(compact('recomandation','old'));
    }

    public function downgradePaymentDetails(Request $request) {   
        $recomandation = CreateSubscription::where('id', $request->id)->first();
        $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
        return view('user.subscriptions.downgradePaymentPage')->with(compact('recomandation','old'));
    }

    public function userSubAdd(Request $request){
        $test = $request->price;
        $price = (float) $test;
        if(Subscription::where('user_id', Auth()->User()->id)->where('status', 1)->exists()){
            return redirect()->route('home')->with('error', 'Already have a subscription');
        }else{
            if(User::find(Auth()->user()->id)->balance < $price){
                return redirect()->route('home')->with('error', 'Insuficent Balance! Please Deposit');
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
            $data->maturity_exp = Carbon::now()->toDateTimeString();
            $data->maturity_left = 0;
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

    public function upgradeList(Request $request){
        // dd(CreateSubscription::where('id', '!=' , $request->id)->where('price', '>', $request->price)->where('status', 1)->get());
        $uplist = CreateSubscription::where('id', '!=' , $request->id)->where('price', '>', $request->price)->where('status', 1)->get();
        $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
        //dd($old);
        return view('user.subscriptions.upgrade')->with(compact('uplist', 'old'));
    }

    public function downgradeList(Request $request){
        // dd(CreateSubscription::where('id', '!=' , $request->id)->where('price', '>', $request->price)->where('status', 1)->get());
        $downlist = CreateSubscription::where('id', '!=' , $request->id)->where('price', '<', $request->price)->where('status', 1)->get();
        $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
        //dd($old);
        return view('user.subscriptions.downgrade')->with(compact('downlist', 'old'));
    }

    public function subUpgrade(Request $request){
        // dd($request->all());
        $test = $request->price;
        $price = (float) $test;

        if(User::find(Auth()->user()->id)->balance < $price){
            // return "False";
            return redirect()->route('user-subscriptions-list')->with('error', 'Insuficent Balance! Please Deposit To Upgrade');
        }else{
            DB::beginTransaction();
            try{ 
                $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
                $old->status = 0;
                $old->cancel_date = Carbon::now()->toDateTimeString();
                $old->maturity_exp = Carbon::now()->toDateTimeString();
                $old->maturity_left = 0;
                // dd($old);
                if($old->save()){
                    $data = new Subscription;
                    $data->user_id = Auth()->User()->id;
                    $data->create_subscription_id = $request->id;
                    $data->active_date = Carbon::now()->toDateTimeString();
                    $data->maturity_exp = date('Y-m-d H:m:s',strtotime( $request->maturity_date . ' day'));
                    $data->maturity_left = Carbon::now()->diffInDays($data->maturity_exp, false);
                    // dd($data);
                    if($data->save()){
                        $trs = User::find(Auth()->user()->id);
                        $trs->decrement('balance',$price);
                        $trs->save();
                        DB::commit();
                        return redirect()->route('user-subscriptions-list')->with('success', 'Subscription Upgraded Successfully!');
                    }
                }else{
                    DB::rollback();
                    return redirect()->route('user-subscriptions-list')->with('errors', 'Something Went Wrong!');
                }              
            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('user-subscriptions-list')->with('error', $e->getMessage());
            }
            // return "working on it";
        }
    }

    public function subDowngrade(Request $request){
        // dd($request->all());
        $test = $request->price;
        $price = (float) $test;

        if(User::find(Auth()->user()->id)->balance < $price){
            // return "False";
            return redirect()->route('user-subscriptions-list')->with('error', 'Insuficent Balance! Please Deposit To Downgrade');
        }else{
            DB::beginTransaction();
            try{ 
                $old = Subscription::where('user_id', Auth()->user()->id)->where('status', 1)->first();
                $old->status = 0;
                $old->cancel_date = Carbon::now()->toDateTimeString();
                $old->maturity_exp = Carbon::now()->toDateTimeString();
                $old->maturity_left = 0;
                // dd($old);
                if($old->save()){
                    $data = new Subscription;
                    $data->user_id = Auth()->User()->id;
                    $data->create_subscription_id = $request->id;
                    $data->active_date = Carbon::now()->toDateTimeString();
                    $data->maturity_exp = date('Y-m-d H:m:s',strtotime( $request->maturity_date . ' day'));
                    $data->maturity_left = Carbon::now()->diffInDays($data->maturity_exp, false);
                    // dd($data);
                    if($data->save()){
                        $trs = User::find(Auth()->user()->id);
                        $trs->decrement('balance',$price);
                        $trs->save();
                        DB::commit();
                        return redirect()->route('user-subscriptions-list')->with('success', 'Subscription Downgraded Successfully!');
                    }
                }else{
                    DB::rollback();
                    return redirect()->route('user-subscriptions-list')->with('errors', 'Something Went Wrong!');
                }              
            }catch (\Exception $e) {
                DB::rollback();
                return redirect()->route('user-subscriptions-list')->with('error', $e->getMessage());
            }
            // return "working on it";
        }
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
