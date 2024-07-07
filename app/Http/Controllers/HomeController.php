<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        if(auth()->user() == null){
            return to_route('auth.login');
        }
        
        return view('home');
    }
}
