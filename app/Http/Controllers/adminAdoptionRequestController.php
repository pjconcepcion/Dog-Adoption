<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdoptionRequest;

class adminAdoptionRequestController extends Controller
{
    public function index(){

        $adoptionRequest = AdoptionRequest::All();

    	return view('adminAdoptionRequest')->with('adoptionRequests', $adoptionRequest);
    	
    }
}
