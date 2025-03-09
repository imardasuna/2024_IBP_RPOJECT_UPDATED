<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('front.about');
    }
    public function photo()
    {
        return view('front.photo');
    }
    public function signup()
    {
        return view('front.signup');
    }
}
