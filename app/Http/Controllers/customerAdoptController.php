<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DogList;

class customerAdoptController extends Controller
{
    public function index(){
        $dogList = DogList::paginate(20);
        return view('customerAdopt')->with('dogLists',$dogList);
    }

    public function show($id){
        $dogList = DogList::where('intDogID','=',$id)->get()->first();
        return view('customerDogProfile')->with('dogLists',$dogList);
    }
}
