<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\MissingReports;

class adminMissingReportsController extends Controller
{
    public function index(){

        $missingReport = MissingReports::All();

    	return view('adminMissingReports')->with('missingReports', $missingReport);
    	
    }

    public function deleteMissingReport(Request $request){

        return redirect('/adminMissingReports');
        
    }

}
