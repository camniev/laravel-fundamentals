<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //since the table under migration is changed, declare the new table name using the protected property inside this class
    protected $table = 'my_brands';
}
