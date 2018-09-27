<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DogList;

class adminDogsController extends Controller
{
    public function index(){

    	$allDog = DogList::ALL();

    	return view('adminDogs')->with('allDogs', $allDog);
    	
    }

    public function insertDog(Request $request){

        
    	// try {
    	//     $file = $request -> file('dogimage');
    	//     $name = "image/dogs/".$productname . '.' . $file->getClientOriginalExtension();

    	//     $request -> file('dogimage') -> move($name);
    	//     copy($name,"../../SPOnline/public/".$name);

    	// } catch (Exception $e) {
    	//     return 'error';
    	// }


    	return redirect('/dogs');
    }

}
