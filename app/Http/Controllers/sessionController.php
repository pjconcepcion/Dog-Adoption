<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sessionController extends Controller
{
    public function deleteSession(Request $request){
        $request -> session() -> flush();
        return redirect('/admin');
    }

    public function storeSession(Request $request,$username){
        session(['login' => $username]);
        return redirect('/adminDashboard');
    }
}

