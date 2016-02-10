<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contactMail()
    {
        return "Hello!";
    }
}
