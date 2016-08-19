<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class TestController extends Controller
{
    public function index() {
        if (Auth::check() && Auth::user()->name == 'Polikarpov') {
            $user = 'Admin';
        } else {
            $user = 'Guest';
        }

        return view('test.test', ['user' => $user]);
    }

    public function middle() {
        dd(Config::get('mail'));
        return view('test.middle');
    }
}
