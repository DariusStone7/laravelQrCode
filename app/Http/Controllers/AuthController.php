<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function doLogin(LoginFormRequest $request){
        if(Auth::attempt($request->validated())){
            return to_route('home');
        }
        return to_route('auth.login');

    }

    public function logout(Request $request){
        Auth::logout();
        session()->flush();

        return to_route('auth.login');
    }
}
