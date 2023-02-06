<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //make functions for the user list
    public function index() {
        $names = ['Johnny','Johnny','Yes','Papa'];
        foreach($names as $name) {
            print($name).'<br/>';
        }
    }

    public function getValue($index, $name="Test") {
        $names = ['Johnny','Johnny','Yes','Papa'];
        return $names[$index].' '.$name;
    }
}
