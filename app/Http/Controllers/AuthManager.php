<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login()
    {
        return view('front.login');
    }

    function loginPost(LoginStore $request) {
        $input = $request->validated();

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        } else {

            return redirect(route('login'))->with('error', 'Login details are not valid');
        }


    }
}
