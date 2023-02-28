<?php

namespace App;

use App\Scope\WithStock;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    //add another column in Products Table
    // open cmd and type the line below to add columns for soft delete in products table
    //php artisan make:migration add_sd_to_products --table="products"

    public $timestamps = false;

    //calling global scope WithStock
    public static function booted() {
        //one way of adding global scope - create a scope class and add it here
        //static::addGlobalScope(new WithStock);

        //one way of using scope - Anonymous scope
        //with Anonymous scope, we don't have to create a scope class
        // we don't have to add the model since we're inside it
        // static::addGlobalScope('outOfStock', function(Builder $builder) {
        //     $builder->where('quantity', 0);
        // });
    }

    //creating local scope
    // public function scopeWithStock($query) {
    //     return $query->where('quantity', '>', 0);
    // }

    //creating a dynamic scope
    // dynamic scope can be used if conditional values are changing
    // to handle error, assign a value to the second parameter
    public function scopeWithStock($query, $quantity = 0) {
        return $query->where('quantity', '>', $quantity);
    }
}
