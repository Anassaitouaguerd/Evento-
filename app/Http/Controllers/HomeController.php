<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('front-office.User.home');
    }
    public function dashboard()
    {
        return view('back-office.dashboard');
    }
}