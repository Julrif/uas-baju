<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login () {
        $data = [
        ];
        return view("pages.login", compact('data'));
    }
}
