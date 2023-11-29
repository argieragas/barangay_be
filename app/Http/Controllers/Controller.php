<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success, 'user' => $user]);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function store(Request $request){
        // $user = new User;
        // $user->name = 'Black Widow';
        // $user->address = 'United State';
        // $user->position = 'Admin';
        // $user->committee = 'Admin';
        // $user->email = 'blackwidow@gmail.com';
        // $user->password = Hash::make('blackwidow');
        $user = new User([
            'name'=> 'Black Widow',
            'address'=> 'United State',
            'position'=> 'Admin',
            'committee'=> 'Admin',
            'email'=> 'blackwidow@gmail.com',
            'password'=> Hash::make('blackwidow')
        ]);
        $user->save();
        return response()->json(['name'=>'success', 'message'=>'successfully to insert to database']);
    }

    public function getUser(){
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    public function userData($id){
        
    }

    public function getReport(){
        $reports = DB::table('report')->get();
        return response()->json($reports);
    }

    public function getCase(){
        $case = DB::table('case')->get();
        return response()->json($case);
    }

    public function getLocation(){
        $location = DB::table('case')->select('location')->get();
        return response()->json($location);
    }
}
