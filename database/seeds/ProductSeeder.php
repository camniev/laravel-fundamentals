<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to create random data, use factory()
        //factory() creates random data to be inserted by the seeder to the database/table
        // argument: (model, number of rows)
        factory(App\Product::class, 20)->create();

        //create factory afterwards (newly created factories can be found in factory database/factories folder)
        //run the ProductSeeder after creating ProductFactory
        //php artisan db:seed --class=ProductSeeder
    }
}
