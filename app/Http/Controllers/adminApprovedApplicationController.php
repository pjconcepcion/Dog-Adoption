<?php

namespace App\Http\Controllers;
use App\AdoptionRequest;
use DB;
use Illuminate\Http\Request;

class adminApprovedApplicationController extends Controller
{

    public function index(){

        $approvedApplication = DB::table('adoptionrequesttbl')
                                ->join('doglisttbl', 'adoptionrequesttbl.intDogID', '=', 'doglisttbl.intDogID')
                                ->select('adoptionrequesttbl.*', 'doglisttbl.strDogName', 'doglisttbl.intDogID')
                                ->where('bitApproved', '=', 1)
                                ->where('bitCompleted', '=', 0)
                                ->where('bitPurgeFlag', '=', 0)
                                ->get();

        return view('adminApprovedApplication')->with('approvedApplications', $approvedApplication);
    }

    public function search(Request $request){

        $search = "%" . $request -> input('search') . "%";

        $approvedApplication = DB::table('adoptionrequesttbl')
                                ->join('doglisttbl', 'adoptionrequesttbl.intDogID', '=', 'doglisttbl.intDogID')
                                ->select('adoptionrequesttbl.*', 'doglisttbl.strDogName', 'doglisttbl.intDogID')
                                ->where('bitApproved', '=', 1)
                                ->where('bitCompleted', '=', 0)
                                ->where('bitPurgeFlag', '=', 0)
                                ->where(DB::raw("CONCAT(`strName`,`intAge`,`strAddress`,`strContact`,`strEmail`,`intNoChildren`,`intNoAdults`,`intNoPets`, `strSelectedPets`,`intPetSkills`, 'doglisttbl.strDogName')"), 'LIKE', $search)
                                ->get();

    	return view('adminApprovedApplication')->with('approvedApplications', $approvedApplication);
    	
    }

    public function approve(Request $request){

        $completeID = $request -> input('applicationID');
        $dogID = $request -> input('dogID');

        DB::table('adoptionrequesttbl')
			->where('intRequestID', $completeID)
            ->update(['bitCompleted' => 1]);
            
        DB::table('doglisttbl')
			->where('intDogID', $dogID)
			->update(['bitIsAdopted' => 1]);

        return redirect('/adminApprovedApplication');
    }

    public function disapprove(Request $request){

        $completeID = $request -> input('applicationID');

        DB::table('adoptionrequesttbl')
			->where('intRequestID', $completeID)
            ->update(['bitPurgeFlag' => 1]);

        return redirect('/adminApprovedApplication');

    }
}
