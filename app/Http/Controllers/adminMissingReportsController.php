<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminMissingReportsController extends Controller
{
    public function index(){

    	return view('adminMissingReports');
    	
    }
}
