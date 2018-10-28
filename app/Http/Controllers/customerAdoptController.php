<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DogList;
use App\AdoptionRequest;

class customerAdoptController extends Controller
{
    public function index(){
        $dogList = DogList::where('bitISAdopted', '=', 0)->paginate(16);
        return view('customerAdopt')->with('dogLists',$dogList);
    }

    public function show($id){
        $dogList = DogList::where('intDogID','=',$id)->get()->first();
        return view('customerDogProfile')->with('dogLists',$dogList);
    }

    public function submit(Request $request,$id){
        $name = $request -> input('name');
        $age = $request -> input('age');
        $address = $request -> input('address');
        $contact = $request -> input('contactNo');
        $emailAddress = $request -> input('emailAddress');
        $noChildren = $request -> input('noChildren');
        $noAdult = $request -> input('noAdults');
        $isAllergic = $request -> input('isAllergic');
        $isAlreadyOwned = $request -> input('isHadPet');
        $noPets = $request -> input('noPets');
        $petOwned = $request -> input('petOwned'); 
        $petSkills = $request -> input('petSkills');  
        $reason = $request -> input('reason');
        $selectedPet = json_encode($petOwned);

        $adoptRequest = new AdoptionRequest;
        $adoptRequest -> intDogID = $id;
        $adoptRequest -> strName = $name;
        $adoptRequest -> intAge = $age;
        $adoptRequest -> strAddress = $address;
        $adoptRequest -> strContact = $contact;
        $adoptRequest -> strEmail = $emailAddress;
        $adoptRequest -> intNoAdults = $noAdult;
        $adoptRequest -> intNoChildren = $noChildren;
        $adoptRequest -> bitAllergic = $isAllergic;
        $adoptRequest -> bitHadPet = $isAlreadyOwned;
        $adoptRequest -> intNoPets = $noPets;
        $adoptRequest -> strSelectedPets = $selectedPet;
        $adoptRequest -> intPetSkills = $petSkills;
        $adoptRequest -> strReason = $reason;
        $adoptRequest -> save();

        return view('layout.thankyou');
    }
}
