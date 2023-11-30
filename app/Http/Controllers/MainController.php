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
            'locationLatLng'=>$request->input('locationLatLng'),
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
                'locationLatLng'=>$request->input('locationLatLng'),
                'details'=>$request->input('details')
            ]);

        return response()->json(['title'=>'success', 'message'=>'Success to update the case']);
    }

    public function getLocationCase(){
        $location = DB::table('case')->get();
        $array = array();
        foreach($location as $loc){
            $str = explode(',',$loc->locationLatLng);
            array_push($array, [
                'lat' => $str[0],
                'lng' => $str[1],
                'icon' => 'assets/img/map-marker-cyan.png',
                'label' => 'Case',
                'content' => "<div style='
                text-align: center;
                font-size: 17px;
                width: 100%;
                border-bottom: 1px solid #ebebeb;
                font-weight: 550;
                margin-bottom: 4px'>
                    <label>CASE</label>
                </div>
                <table>
                <tr>
                    <th style='width: 80px; font-size: 14px'>Title : </th>
                    <td>$loc->title</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 80px; font-size: 14px'>Type : </th>
                    <td style='padding-top: 4px;'>$loc->type</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 80px; font-size: 14px'>Details : </th>
                    <td style='padding-top: 4px;'>$loc->details</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 80px; font-size: 14px'>Location : </th>
                    <td style='padding-top: 4px;'>$loc->location</td>
                </tr>
                </table>"
            ]);
        }
        return response()->json($array);
    }

    public function deleteCase($id){
        $get = Cases::find($id)->delete();
    }
}
