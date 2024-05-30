<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function user_activation(Request $request)
    {

        echo "Hi";die;
        $get_token = $request->token;
        $get_token = Verifytoken::where('token', $get_token)->first();

        if ($get_token) {
            $get_token->is_activated = 1;
            $get_token->save();

            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1;
            $user->save();

            $getting_token = Verifytoken::where('token', $get_token->token)->first();
            $getting_token->delete();

            return Redirect::route('login')->with('msg', 'Your Account has been activated successfully');
        } else {
            return Redirect::route('login')->with('msg', 'Your OTP is invalid please check your email');
        }
    }

}
