<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Laptops',
                'created_at' => '2019-04-18 03:38:53',
                'updated_at' => '2019-04-18 03:38:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Desktops',
                'created_at' => '2019-04-18 03:39:33',
                'updated_at' => '2019-04-18 03:39:33',
            ),
        ));
        
        
    }
}