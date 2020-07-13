<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
	     array(
	       'category_name' => 'Clothing',
	     ),
	     array(
	       'category_name' => 'Mobile',
	     ),
         array(
           'category_name' => 'Accessories',
         ),
         array(
           'category_name' => 'Books',
         ),
         array(
           'category_name' => 'Gaming',
         ),
         array(
           'category_name' => 'Computers',
         ),
	   ));
    }
}
