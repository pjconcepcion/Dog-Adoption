<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AdoptionRequest;

class adminAdoptionRequestController extends Controller
{
    public function index(){

        $adoptionRequest = DB::Table('adoptionrequesttbl')->join('doglisttbl', 'doglisttbl.intDogID', '=', 'adoptionrequesttbl.intDogID')
                                ->Select('adoptionrequesttbl.*', 'doglisttbl.strDogName')
                                ->get();

    	return view('adminAdoptionRequest')->with('adoptionRequests', $adoptionRequest);
    	
    }
}
