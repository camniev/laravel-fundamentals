<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    //add another column in Products Table
    // open cmd and type the line below to add columns for soft delete in products table
    //php artisan make:migration add_sd_to_products --table="products"

    public $timestamps = false;
}
