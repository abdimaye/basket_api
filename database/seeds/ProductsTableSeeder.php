<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (env('APP_ENV') !== 'production') {
    		for ($i = 1; $i < 11; $i++) {
		    	DB::table('products')->insert([
		    		"name" => "Album $i",
		    		"description" => "Album description $i",
		    		"price" => rand(100, 20000)
		    	]);
		    }
		}
	}
    
}
