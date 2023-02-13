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
        //Product::where('id', 12)->delete();

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
}
