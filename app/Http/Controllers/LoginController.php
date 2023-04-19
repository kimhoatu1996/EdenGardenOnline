<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function login(){
        return view('Login.login');
    }
}
