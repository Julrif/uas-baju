<?php

namespace App\Http\Controllers;
use App\Models\Product;

class HomeController extends Controller
{
    function home() {
        return view('welcome');
    }

    function products() {
        $data = Product::with("image")->get();
        return view('pages.products', compact('data'));
    }

    function about() {
        return view("pages.about");
    }
}
