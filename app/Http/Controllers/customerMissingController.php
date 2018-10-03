<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MissingReports;

class customerMissingController extends Controller
{
    public function index(){
        $missingDog = MissingReports::where('bitIsApproved','=',0)->paginate(5);

        return view('customerMissing')->with('missingDogs',$missingDog);
    }

    public function show(){
        return view('customerReportMissing');
    }
}
