<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    
    public function index(){

    	return view('adminDashboard');
    }

}
