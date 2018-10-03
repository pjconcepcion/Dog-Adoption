<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StrayReports;

class customerContactController extends Controller
{
    public function index(){
        return view('customerContact');
    }

    public function insert(Request $request){

        $name = $request -> input('name');
        $email = $request -> input('email');
        $street = $request -> input('street');
        $barangay = $request -> input('barangay');
        $city = $request -> input('city');
        $description = $request -> input('description');
        $message = $request -> input('message');

        $strayReport = new StrayReports;
        $strayReport -> strReporterName = $name;
        $strayReport -> strReporterEmail = $email;
        $strayReport -> strStreetName = $street;
        $strayReport -> strBarangay = $barangay;
        $strayReport -> strCity = $city;
        $strayReport -> strDogDescription = $description;
        $strayReport -> strNotes = $message;
        $strayReport -> dtReportDate = NOW();
        $strayReport -> save();

        return redirect('/contact');
    }
}
