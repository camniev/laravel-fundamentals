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
Route::get('/products', 'ProductController@products');
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
        'price' => '100',
        'quantity' => '12'
    ]);
});

// to insert multiple rows of random data, use seeder
// php artisan make:seeder ProductSeeder

// FEB 12, 2023
// ELOQUENT - active record implementation of the databases; make database interaction easier
// first, create a model and migration
// php artisan make:model Brand -m
// then run migration with: php artisan migrate


// SOFT DELETE - deleting a record without actually removing it from the database
// proceed to model to implement soft delete

// Feb 24, 2023
// SCOPE - method in our model where it adds database logic in the model
// Three types: Global, Local and Dynamic Scope

// routes for scope
Route::group(['prefix' => 'products'], function() {
    Route::get('/outOfStock', 'ProductController@outOfStock');
    Route::get('/withStock', 'ProductController@withStock');

    //route to display form for "create products "
    Route::get('/create', 'ProductController@create')->name('product.create');

    //create another route to handle user input
    //assign name to this route
    Route::post('/store', 'ProductController@store')->name('product.name');

    //CRUD
    Route::get('/list', 'ProductController@list')->name('product.list');;
    Route::get('/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/update', 'ProductController@update')->name('product.update');
    Route::post('/delete', 'ProductController@delete')->name('product.delete');
});

// Feb 27, 2023
// FORM VALIDATION
// we use forms to fetch data from end-users
// before it is saved to the database, the data has to be validated
// create form under views folder

//Feb 28, 2023
//CRUD
//using eloquent's paginate method
// <!-- create pagination links -->
// <!-- {{ $products->links() }} -->

//<!-- use @stack to put all the scripts from the view (display from the layout.app) -->

//<!-- //forward scripts to stack using @push inside the view -->