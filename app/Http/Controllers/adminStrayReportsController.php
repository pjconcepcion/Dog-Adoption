<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\sendReplyStrayReport;
use App\StrayReports;

class adminStrayReportsController extends Controller
{
    public function index(Request $request){
        if(!($request -> session() -> exists('login'))){
            return redirect('/admin');
        }
        $strayReport = StrayReports::All()->sortByDesc('dtReportDate');

    	return view('adminStrayReports')->with('strayReports', $strayReport);	
    }

    public function searchStrayReport (Request $request){

        $search = "%" . $request -> input('search') . "%";

        $strayReport = StrayReports::where(DB::raw("CONCAT(`strReporterName`, `strReporterEmail`, `strStreetName`, `strBarangay`, `strCity`, `strDogDescription`, `dtReportDate`)"), 'LIKE', $search)->get();
 
    	return view('adminStrayReports')->with('strayReports', $strayReport);	    	
    	
    }

    public function deleteReport(Request $request){

        $reportID = $request -> input('reportID');
        
        DB::table('strayreportstbl')->where('intStrayReportID', '=', $reportID)->delete();

        return redirect('/adminStrayReports');

    }

    public function replyStrayReport(Request $request){

        $reportID = $request -> input('reportID');

        session(['sendName' => $request -> input('sendName')]);
        session(['sendEmail' => $request -> input('sendEmail')]);
        session(['sendLocation' => $request -> input('sendLocation')]);
        
        DB::table('strayreportstbl')
			->where('intStrayReportID', $reportID)
			->update(['bitResponded' => 1]);
		
        $this -> strayReportEmail();

        return redirect('/adminStrayReports');
    }

    public function strayReportEmail(){

        Mail::send(new sendReplyStrayReport());

    } 
}
