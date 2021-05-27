<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Auth;
use DB;

class UserController extends Controller
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
        $users = User::get()->reverse();
        $sl = 0;
        return view('admin.user.index')->with(compact('users', 'sl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required | string | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:4',
        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->type = $request->type;
        $data->created_by = Auth()->user()->id;
        // dd($data);
        DB::beginTransaction();
        try {
            if($data->save()){
                DB::commit();
                return redirect()->route('admin-user.index')->with('success', 'User Added Successfully!');
            }else{
                DB::rollback();
                return redirect()->route('admin-user.index')->with('errors', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-user.index')->with('error', $e->getMessage());
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        DB::beginTransaction();
        try {
            $data = User::find($request->id);
            $data->type = $request->type;
            $data->updated_by = Auth()->user()->id;
            // dd($data);
            if($data->save()){
                DB::commit();
                return redirect()->route('admin-user.index')->with('success', 'User Updated Successfully!');
            }else{
                DB::rollback();
                return redirect()->route('admin-user.index')->with('errors', 'Somethings Went Wrong!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-user.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {    
        DB::beginTransaction();
        try {
            $data = User::findOrFail($id);
            if($data->destroy($id)){
                DB::commit();
                return redirect()->route('admin-user.index')->with('success', 'User Deleted Successfully!');
            }else{
                DB::rollback();
                return redirect()->route('admin-user.index')->with('errors', 'Somethings Went Wrong!');
            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-user.index')->with('error', $e->getMessage());
        }
    }
}
