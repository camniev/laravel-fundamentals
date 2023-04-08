<?php

use App\Brand;
use App\Category;
use App\Product;
use App\ProductDetail;
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

//March 1, 2023
//ELOQUENT RELATIONSHIPS
// same concept with DBMS relationships
// TYPE OF RELATIONSHIPS: one to one, one to many, many to many
// add another table to extend other columns for product

//FROM PRODUCT TO PRODUCTDETAIL
// Make model and migration at the same time:
// ProductDetail - php artisan make:model ProductModel -m
// then add columms to migration

// afterwards, run migration to create the table in the database
// php artisan migrate

// go to Product model and make a function
// public function detail()
// use hasOne() method for one-to-one relationships - from Product to ProductDetail

//then make a route to display the result using one-to-one relationship
Route::get('/one', function() {
    $product = Product::find(199)->details;
    dd($product);
});
//searches product_id 199 inside Product table and displays data from ProductDetail table

//inverse relationship
// use belongsTo() method for inverse one-to-one relationships
//FROM PRODUCTDETAIL TO PRODUCT
// go to ProductDetail model
Route::get('/anotherone', function() {
    $product = ProductDetail::find(4)->product;
    dd($product);
});
//searches ID 2 inside ProductDetail table and displays data from Product table
//STOPPED AT 7:42

//ONE TO MANY
// one brands can have multiple products
// to implement one-to-many relationship between brand table and products table, we need to make migration first
// add brand id to products table using migration
// php artisan make:migration add_brand_id_to_products --table="products"
// inside add_brand_id_to_products migration, add unsignedInteger for brand id and then migrate
// php artisan migrate

//add new function inside Brand model
//inside function, use hasMany() method to implement one-to-many relationship

//create route
Route::get('/oneMany', function() {
    //displays products under HP
    $product = Brand::find(1)->products;
    dd($product);
});

//inverse one to many
//create a function brand() inside product model
Route::get('/invOneMany', function() {
    //displays the brand of a specific product
    $product = Product::find(14)->brand;
    dd($product);
});


//MANY TO MANY
//one of the complicated relationship within relational database
// one products can have multiple categories (i.e. HP can be categorized as electronics)
// categories can have multiple products

// One to one
// Tables: Products
//         Product Details

//One to many
// Tables:  Brands
//          Products

//Many to many
// Tables: Products
//          Categories
//products can have many categories, categories can have many products

//make model and migration for category
//php artisan make:model Category -m

//since we're going to use many-to-many relationship, we're going to create another table (also called bridge table) using model + migration
//follow alphabetical order when creating bridge tables
//php artisan make:model CategoryProduct -m
//check category and categoryproduct migrations for comments
//after modifying the migrations, type php artisan migrate

//create function for both Product and Category Model
// use belongsToMany() method for both

//Route to display many to many rel
Route::get('/manytomany', function() {
    //product ID 13
    $product = Product::find(13)->categories;
    dd($product->toArray());
});

//inverse relationship
Route::get('/invmanytomany', function() {
    //category ID 1 to search products under Electronics category
    $product = Category::find(2)->products;
    dd($product->toArray());
});