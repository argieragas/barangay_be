<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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

        $user = DB::table('users')->where('email',$request->input('email'));
        return response()->json(['user' => $user]);
    }

    public function getCount(){
        $case = DB::table('case')->count();
        $user = DB::table('users')->count();
        $report = DB::table('report')->count();
        return response()->json(['case'=>$case, 'user'=>$user, 'report'=>$report]);
    }

    public function getDashboard(){
        $year = date("Y");
        $array = array();
        for($i = 2000; $i <= $year ;$i++){
            $case = DB::table('case')->where('date_created', 'like', '%'.$i.'%')->get();
            $report = DB::table('report')->where('date', 'like', '%'.$i.'%')->get();
            if($case->count() > 0 || $report->count() > 0){
                array_push($array,['year'=>$i, 'case' => $case->count(), 'report' => $report->count()]);
            }
        }
        return $array;
    }
}
