<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {

        // there are three ways to pass data
        // first is key-value pair (array)
        // $title="Home";
        // return view('home', ['title' => $title]);

        //second, using compact
        // $title="Home";
        // return view('home', compact('title'));

        //third, using WITH
        $title="Home";
        return view('home')->with(['title' => $title]);
    }

    public function products() {
        $title="Products";

        $products = [
            [
                'name' => 'Product 1',
                'price' => '100'
            ],
            [
                'name' => 'Product 2',
                'price' => '200'
            ],
            [
                'name' => 'Product 3',
                'price' => '300'
            ]
        ];

        return view('products', compact('title', 'products'));
    }

    public function about() {
        $title="About";
        return view('about', compact('title'));
    }
}
