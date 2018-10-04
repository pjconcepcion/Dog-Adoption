<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DogList;

class customerHomeController extends Controller
{
    public function index(){
        $dogList = DogList::inRandomOrder()->take(6)->get();

        return view('customerHome')->with('dogLists', $dogList);
    }
    
}
