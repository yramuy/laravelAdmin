<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('front.home');
    }

    public function dashboard() {
        return view('front.dashboard');
    }

    public function users() {
        return view('front.users');
    }
    public function login_page() {
        return view('front.login');
    }
}
