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
        return view('home', compact('title'));
    }

    public function about() {
        $title="About";
        return view('about', compact('title'));
    }
}
