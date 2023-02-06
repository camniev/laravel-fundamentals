<?php

use App\Product;
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

//route for import excel
Route::get('/import_excel', 'ImportExcelController@index');
Route::post('/import_excel/import', 'ImportExcelController@import');

//code(s) to check if the web app is connected to the database or not
// Route::get('/db', function() {
//     try {
//         DB::connection()->getPdo();
//         echo "Connected!" . DB::connection()->getDatabaseName();
//     } catch (\Exception $e) {
//         echo "Not connected. :(";
//     }
// });

//create table using migration
//php artisan make:migration create_products_table


// to insert data, make a simple route such as below
Route::get('/insert', function() {
    Product::insert([
        'name' => 'Sample',
        'price' => '100'
    ]);
});

// to insert multiple rows of random data, use seeder
// php artisan make:seeder ProductSeeder