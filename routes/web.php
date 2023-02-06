<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user', function() {
//     $names = ['Johnny','Johnny','Yes','Papa'];
//     foreach($names as $name) {
//         print($name).'<br>';
//     }
// });

// accessing a parameter
// Route::get('/user/{index}', function($index) {
//     $names = ['Johnny','Johnny','Yes','Papa'];
//     return $names[$index];
// });

// accessing an optional parameter
// optional parameter has to have a default value
// Route::get('/user/{index}/{name?}', function($index, $name="Test") {
//     $names = ['Johnny','Johnny','Yes','Papa'];
//     return $names[$index].' '.$name;
// });

//one way to access route - assign a name
// Route::get('user/', function() {
//     $names = ['Johnny','Johnny','Yes','Papa'];
//     foreach($names as $name) {
//         print($name).'<br/>';
//     }
// })->name('userList');

// Route::get('/user/{index}/{name?}', function($index, $name="Test") {
//     //line to redirect 
//     return redirect()->route('userList');
// });



//As project gets bigger, group routes to organize
// Route::group(['prefix' => 'user'], function() {
//     //one way to access route - assign a name
//     Route::get('/', function() {
//         $names = ['Johnny','Johnny','Yes','Papa'];
//         foreach($names as $name) {
//             print($name).'<br/>';
//         }
//     })->name('userList');

//     Route::get('/{index}/{name?}', function($index, $name="Test") {
//         $names = ['Johnny','Johnny','Yes','Papa'];
//         return $names[$index].' '.$name;
//     });
// });

// logic inside functions gets bigger, use controller for this
//open cmd and type php artisan make:controller UserController (pascal case in creating controllers)
// Route::group(['prefix' => 'user'], function() {
//     Route::get('/', 'UserController@index')->name('userList');

//     Route::get('/{index}/{name?}', 'UserController@getValue');
// });

Route::get('/home', 'PageController@index');
Route::get('/products', 'PageController@products');
Route::get('/about', 'PageController@about');