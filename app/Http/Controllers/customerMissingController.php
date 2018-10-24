<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\MissingReports;

class customerMissingController extends Controller
{
    public function index(){
        $missingDog = MissingReports::where('bitIsApproved','=',1)
                    ->where(DB::raw("DATE_ADD(`dtFiledMissing`, INTERVAL 30 DAY)"), '>=', NOW())
                    ->paginate(5);

        return view('customerMissing')->with('missingDogs',$missingDog);
    }

    public function show(){
        return view('customerReportMissing');
    }
}
