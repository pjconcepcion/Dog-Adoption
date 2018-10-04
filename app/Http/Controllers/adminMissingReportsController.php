<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\approveMissingReport;
use App\MissingReports;

class adminMissingReportsController extends Controller
{
    public function index(){

        $missingReport = MissingReports::All();

    	return view('adminMissingReports')->with('missingReports', $missingReport);
    	
    }

    public function searchReport(Request $request){

        $search = "%" . $request -> input('search') . "%";

        $missingReport = MissingReports::where(DB::raw("CONCAT(`strReporterName`,`strReporterContactNo`,`strReporterEmail`,`strDogName`,`strDogDescription`,`dtFiledMissing`)"), 'LIKE', $search)->get();
 
    	return view('adminMissingReports')->with('missingReports', $missingReport);
    	
    }

    public function deleteReport(Request $request){

        $reportID = $request -> input('reportID');
        
        DB::table('missingreportstbl')->where('intMissingReportID', '=', $reportID)->delete();

        return redirect('/adminMissingReports');

    }

    public function approveReport(Request $request){

        $reportID = $request -> input('reportID');

        session(['mrName' => $request -> input('name')]);
        session(['mrEmail' => $request -> input('email')]);
        session(['mrDogname' => $request -> input('dogname')]);
        
        DB::table('strayreportstbl')
			->where('intStrayReportID', $reportID)
			->update(['bitResponded' => 1]);
		
        $this -> missingReportEmail();

        return redirect('/adminMissingReports');
    }

    public function missingReportEmail(){

        Mail::send(new approveMissingReport());

    } 

}
