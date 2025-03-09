<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Hash;
use Auth;

class CustomerLoginController extends Controller
{
    public function signup()
    {
        return view('front.signup');
    }
}
