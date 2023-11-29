<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Cases;

class MainController extends Controller{
    public function register(Request $request){
        DB::table('users')->insert([
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'position'=>$request->input('position'),
            'committee'=>$request->input('committee'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);

        return response()->json(['title'=>'success', 'message'=>'Success to register']);
    }


    public function newCase(Request $request){
        DB::table('case')->insert([
            'title'=>$request->input('title'),
            'type'=>$request->input('type'),
            'complainantfName'=>$request->input('complainantfName'),
            'complainantmName'=>$request->input('complainantmName'),
            'complainantlName'=>$request->input('complainantlName'),
            'complainantAddress'=>$request->input('complainantAddress'),
            'complainantLatLng'=>$request->input('complainantLatLng'),
            'complaintfName'=>$request->input('complaintfName'),
            'complaintmName'=>$request->input('complaintmName'),
            'complaintlName'=>$request->input('complaintlName'),
            'complaintAddress'=>$request->input('complaintAddress'),
            'complaintLatLng'=>$request->input('complaintLatLng'),
            'schedule'=>$request->input('schedule'),
            'status'=>$request->input('status'),
            'remark'=>$request->input('remark'),
            'location'=>$request->input('location'),
            'details'=>$request->input('details')
        ]);
        return response()->json(['title'=>'success', 'message'=>'Success to add new case']);
    }

    public function updateCase(Request $request){
        $affected = DB::table('case')
            ->where('id', $request->input('id'))
            ->update([
                'title'=>$request->input('title'),
                'type'=>$request->input('type'),
                'complainantfName'=>$request->input('complainantfName'),
                'complainantmName'=>$request->input('complainantmName'),
                'complainantlName'=>$request->input('complainantlName'),
                'complainantAddress'=>$request->input('complainantAddress'),
                'complainantLatLng'=>$request->input('complainantLatLng'),
                'complaintfName'=>$request->input('complaintfName'),
                'complaintmName'=>$request->input('complaintmName'),
                'complaintlName'=>$request->input('complaintlName'),
                'complaintAddress'=>$request->input('complaintAddress'),
                'complaintLatLng'=>$request->input('complaintLatLng'),
                'schedule'=>$request->input('schedule'),
                'status'=>$request->input('status'),
                'remark'=>$request->input('remark'),
                'location'=>$request->input('location'),
                'details'=>$request->input('details')
            ]);

        return response()->json(['title'=>'success', 'message'=>'Success to update the case']);
    }

    public function deleteCase($id){
        $get = Cases::find($id)->delete();
    }
}
