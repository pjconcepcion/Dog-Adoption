<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerContactController extends Controller
{
    public function index(){
        return view('customerContact');
    }
}
