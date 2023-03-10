<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function products() {
        $title="Products";

        //inserting data to database
        // Product::insert([
        //     'name' => 'Product-12345',
        //     'price' => '100'
        // ]);

        //updating data 
        // Product::where('id', 18)->update([
        //     'name' => 'Product-12346',
        //     'price' => '100'
        // ]);

        //using eloquent to delete
        //implemented soft deletes
        //Product::where('id', 19)->delete();

        //using eloquent to restore a record
        //Product::where('id', 12)->restore();

        //displays deleted record
        //Product::onlyTrashed()->get();

        //displays all records including deleted row
        // Product::withTrashed()->get();

        //get all records from products table. similar to "SELECT * FROM products"
        $products = Product::all();

        return view('products', compact('title', 'products'));
    }

    public function withStock() {
        //$withStock = Product::where('quantity', '>', 0)->get();
        //every time Product model is called, this function only returns quantities of product. this is where global scope comes in

        //check first if above query works
        //dd($withStock);

        //if works, let's proceed with creating global scope
        //app\Scope\WithStock.php

        //go to Product model to call the global scope (WithStock)
        //so instead of using where clause in controller ($withStock), we can already call the scope
        //$withStock = Product::get();
        //dd($withStock);

        //stopped at 4:08

        //how do we remove global scope?
        //removing global scope
        //$withStock = Product::withoutGlobalScope(WithStock::class)->get();

        //removing anonymous scope
        //$withStock = Product::withoutGlobalScope('outOfStock')->get();

        //accessing a local scope
        // $withStock = Product::withStock()->get();
        

        //dynamic scope
        // getting rows from query where products with quantities that are greater than 3
        $withStock = Product::withStock(3)->get();
        dd($withStock);

    }

    public function outOfStock() {
        $outOfStock = Product::where('quantity', 0)->get();
        dd($outOfStock);
    }

    public function create() {
        return view('product.create');
    }

    public function store(Request $request) {
        //use request to obtain data from the form
        //dd($request->all());

         //validating data using request
        //check laravel docs for list of validation rules
        // | - delimiter
        $request->validate([
            'name' => 'required|alpha',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        //to display error, go back to create.blade.php
        // @error

        //to save form data, we can use create method in Product model
        Product::create($request->all());
        //next, set fillable property inside Product model

        //to display success message, type the ff.
        //use associative array
        return redirect()->back()->with(['message' => 'Success']);
    }

    public function list() {
        //use eloquent's paginate method 
        //$products = Product::paginate(10);

        $products = Product::all();
        return view('product.list', compact('products'));
    }

    public function edit(Request $request) {
        //pass the description of the "product" to be edited
        //to do that, use Request
        //get the permission of the ID first passed to the URL
        $product = Product::find($request->id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request) {
        //form validation
        $request->validate([
            'name' => 'required|alpha',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        Product::find($request->id)->update($request->all());

        return redirect()->back()->with(['message' => 'Updated successfully.']);
    }

    public function delete(Request $request) {
        $product = Product::find($request->id)->delete();

        return redirect()->route('product.list');
    }
}
