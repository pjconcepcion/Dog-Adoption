<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DogList;

class adminDogsController extends Controller
{
    public function index(Request $request){
        if(!($request -> session() -> exists('login'))){
            return redirect('/admin');
        }

    	$allDog = DogList::paginate(15);

    	return view('adminDogs')->with('allDogs', $allDog);
    	
	}
	
	public function searchDog (Request $request){

        $search = "%" . $request -> input('search') . "%";

        $allDog = DogList::where(DB::raw("CONCAT(`strDogName`, `strAge`, `strSex`, `strCondition`, `strDescription`)"), 'LIKE', $search)->get();
 
    	return view('adminDogs')->with('allDogs', $allDog);
    	
    }

    public function insertDog(Request $request){
		
		$name = $request -> input('name');
		$age = $request -> input('age');
		$sex = $request -> input('sex');
		$condition = $request -> input('condition');
		$description = $request -> input('description');

		try {
            $file = $request -> file('dogimage');
            $photoname = "/image/dogs/". $name . rand(11111, 99999) .'.' . $file->getClientOriginalExtension();
			$request -> file('dogimage') -> move("image/dogs", $photoname);

        } catch (Exception $e) {
            return view ('index');       
		}

		$dogRecord = New DogList;

		$dogRecord -> strDogName = $name;
		$dogRecord -> strAge = $age;
		$dogRecord -> strSex = $sex;
		$dogRecord -> strCondition = $condition;
		$dogRecord -> strDescription = $description;
		$dogRecord -> imgDogPhoto = $photoname;
		$dogRecord -> bitIsAdopted = 0;
		$dogRecord -> save();

    	return redirect('/adminDogs');
	}
	
	public function editDog(Request $request){

		$dogID = $request -> input('dogID');
		$name = $request -> input('name');
		$age = $request -> input('age');
		$sex = $request -> input('sex');
		$condition = $request -> input('condition');
		$description = $request -> input('description');

		DB::table('doglisttbl')
			->where('intDogID', $dogID)
			->update(['strDogName' => $name, 'strAge' => $age, 'strSex' => $sex, 'strCondition' => $condition, 'strDescription' => $description]);
		
		return redirect('/adminDogs');
	}

	public function deleteDog(Request $request){

		$dogID = $request -> input('dogID');

    	DB::table('doglisttbl')->where('intDogID', '=', $dogID)->delete();

		return redirect('/adminDogs');
	}

}
