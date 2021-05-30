<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\CreateSubscription;
use App\Models\Subscription;
use DB;

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
    public function index(){
        $data = CreateSubscription::where('status', 1)->get()->reverse();
        $sl = 0;
        return view('admin.subscription.index')->with(compact('data', 'sl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required | string | min:3 | unique:create_subscriptions',
            'price' => 'required | numeric | between:0, 100000000',
            'interest_rate' => 'required | numeric | between:0, 100000000',
            'start_date' => 'required | date',
            'maturity_date' => 'required | integer',
            'bill_type' => 'required | string'
        ]);
        // dd($request->all());
        $data = new CreateSubscription;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->interest_rate = $request->interest_rate;
        $data->start_date = $request->start_date;
        $data->maturity_date = $request->maturity_date;
        $data->bill_type = $request->bill_type;
        $data->created_by = Auth()->User()->id;
        // dd($data);
        DB::beginTransaction();
        try {
            if($data->save()){
                DB::commit();
                return redirect()->route('admin-subscription.index')->with('success', 'Subscription Plan Created Successfully!');
            }else {
                DB::rollback();
                return redirect()->route('admin-subscription.index')->with('error', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-subscription.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        DB::beginTransaction();
        try {
            $data = CreateSubscription::find($request->id);
            $data->name = $request->name;
            $data->price = $request->price;
            $data->interest_rate = $request->interest_rate;
            $data->start_date = $request->start_date;
            $data->maturity_date = $request->maturity_date;
            $data->bill_type = $request->bill_type;
            $data->updated_by = Auth()->User()->id;
            // dd($data);
            if($data->save()){
                DB::commit();
                return redirect()->route('admin-subscription.index')->with('success', 'Subscription Plan Updated Successfully!');
            }else {
                DB::rollback();
                return redirect()->route('admin-subscription.index')->with('error', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-subscription.index')->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // dd($id);
        DB::beginTransaction();
        try {
            $data = CreateSubscription::find($id);
            $data->status = 0;
            // dd($data);
            if($data->save()){
                DB::commit();
                return redirect()->route('admin-subscription.index')->with('success', 'Subscription Plan Deleted Successfully!');
            }else {
                DB::rollback();
                return redirect()->route('admin-subscription.index')->with('error', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-subscription.index')->with('error', $e->getMessage());
        }
    }

    
    public function subscribedMember(){
        $subscriber = Subscription::get()->reverse();
        $sl = 0;
        return view('admin.user.members')->with(compact('subscriber', 'sl'));
    }
}
