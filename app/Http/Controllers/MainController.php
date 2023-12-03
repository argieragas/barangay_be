<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function getCountCase(){
        $count = DB::table('case')->count();
        return $count;
    }

    public function getCountReport(){
        $count = DB::table('report')->count();
        return $count;
    }
}
