<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MissingReports;

class customerReportMissingController extends Controller
{
    public function index(){
        return view('customerReportMissing');
    }

    public function submit(Request $request){
        $name = $request -> input('name');
        $email = $request -> input('email');
        $contact = $request -> input('contact');
        $petName = $request -> input('petName');
        $petDescription = $request -> input('petDescription');
        $petNote = $request -> input('petNote');
        
		try {
            $petImg = $request -> file('petImg');
            $imgPath = "/image/missing/". $petName . rand(11111, 99999) .'.' . $petImg->getClientOriginalExtension();
			$request -> file('petImg') -> move("image/missing", $imgPath);
        } catch (Exception $e) {
            return view ('index');       
		}

        $missingReport = new MissingReports;
        $missingReport -> strReporterName = $name;
        $missingReport -> strReporterEmail = $email;
        $missingReport -> strReporterContactNo = $contact;
        $missingReport -> strDogName = $petName;
        $missingReport -> strDogDescription = $petDescription;
        $missingReport -> strNotes = $petNote;
        $missingReport -> imgDogMissing = $imgPath;
        $missingReport -> dtFiledMissing = NOW();
        $missingReport -> save();

        return redirect('/missing');    
    }
}
