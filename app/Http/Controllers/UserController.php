<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function settings(){
        return view('auth.login.login');
    }

    public function index(){
        return view('auth.user')
    }
}
