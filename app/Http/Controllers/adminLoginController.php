<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class adminLoginController extends Controller
{
    public function index(){
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
            return redirect('/adminDashboard');
        }else{
            return redirect()->back()->withErrors(['errorLogin',true]);
        }
    }
}
