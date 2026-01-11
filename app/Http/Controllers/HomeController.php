<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home() {
        return view('welcome');
    }

    function products() {
        $data = [
            [
                'id' => 1,
                'name' => "Baju Bahar Cenah",
                'image' => "https://placehold.co/400",
                'price' => 1000000,
                'size' => 'S',
                'description' => 'lorem ipsum dolor sit memet !.'
            ]
        ];

        return view('pages.products', compact('data'));
    }
}
