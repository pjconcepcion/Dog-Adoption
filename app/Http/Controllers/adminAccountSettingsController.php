<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminAccountSettingsController extends Controller
{
    public function index(Request $request){
        if(!($request -> session() -> exists('login'))){
            return redirect('/admin');
        }
    	return view('adminAccountSettings');
    }
}
