<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\approveAdoptionApplication;
use App\AdoptionRequest;

class adminAdoptionRequestController extends Controller
{
    public function index(Request $request){
        if(!($request -> session() -> exists('login'))){
            return redirect('/admin');
        }

        $adoptionRequest = DB::table('adoptionrequesttbl')
                             ->join('doglisttbl', 'adoptionrequesttbl.intDogID', '=', 'doglisttbl.intDogID')
                             ->select('adoptionrequesttbl.*', 'doglisttbl.strDogName')
                             ->where('adoptionrequesttbl.bitPurgeFlag', '=', 0)
                             ->get();

    	return view('adminAdoptionRequest')->with('adoptionRequests', $adoptionRequest);
	
    }

    public function search(Request $request){

        $search = "%" . $request -> input('search') . "%";

        $adoptionRequest = DB::table('adoptionrequesttbl')
                                ->join('doglisttbl', 'adoptionrequesttbl.intDogID', '=', 'doglisttbl.intDogID')
                                ->select('adoptionrequesttbl.*', 'doglisttbl.strDogName', 'doglisttbl.intDogID')
                                ->where('bitApproved', '=', 1)
                                ->where('bitCompleted', '=', 0)
                                ->where('bitPurgeFlag', '=', 0)
                                ->where(DB::raw("CONCAT(`strName`,`intAge`,`strAddress`,`strContact`,`strEmail`,`intNoChildren`,`intNoAdults`,`intNoPets`, `strSelectedPets`,`intPetSkills`, 'doglisttbl.strDogName')"), 'LIKE', $search)
                                ->get();

    	return view('adminAdoptionRequest')->with('adoptionRequests', $adoptionRequest);
    	
    }

    public function approveApplication(Request $request){
        
        $applicationID = $request -> input('applicationID'); 
        session(['applicationEmail' => $request -> input('email')]);

        DB::table('adoptionrequesttbl')
			->where('intRequestID', $applicationID)
			->update(['bitApproved' => 1]);
        
        $this -> approveApplicationEmail();

        return redirect('/adminAdoptionRequest');
    }

    public function approveApplicationEmail(){

        Mail::send(new approveAdoptionApplication());

    } 

    public function deleteApplication(Request $request){

        $applicationID = $request -> input('applicationID'); 

        DB::table('adoptionrequesttbl')
			->where('intRequestID', $applicationID)
			->update(['bitPurgeFlag' => 1]);

        return redirect('/adminAdoptionRequest');
    }

   
}
