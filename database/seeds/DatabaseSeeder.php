<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    Storage::deleteDirectory('products');
	    Storage::makeDirectory('products');

	    factory(\App\Product::class, 5)->create();

    }
}
