<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminLoginController extends Controller
{
    public function index(){
        return view('adminLogin');
    }
}
