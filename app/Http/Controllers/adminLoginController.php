<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
include('sessionController.php');

class adminLoginController extends Controller
{
    public function index(Request $request){
        if($request -> session() -> exists('login')){
            return redirect('/adminDashboard');
        }
        return view('adminLogin');
    }

    public function login(Request $request){
        $username = $request -> input('username');
        $password = $request -> input('password');

        $user = User::where('strUsername','=',$username)
                    ->where('strPassword','=',$password)
                    ->where('bitFlag','=',1)
                    ->exists();
        
        if($user){
            $request -> session() -> put('login',true);
            return redirect('/adminDashboard');
        }else{
            return redirect()->back()->withErrors(['errorLogin',true]);
        }
    }
}
