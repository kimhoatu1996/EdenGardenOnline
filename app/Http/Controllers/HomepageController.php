<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        return view('Homepage.homepage');
    }
    public function menu(){
        return view('Homepage.menu');
    }
}
