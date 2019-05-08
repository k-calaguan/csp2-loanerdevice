<?php

use Illuminate\Database\Seeder;

class ModelnamesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modelnames')->delete();
        
        \DB::table('modelnames')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dell OptiPlex 5040 SFF',
                'image' => '/images/Dell_OptiPlex_5040_SFF.jpg',
                'specs' => 'test',
                'category_id' => 2,
                'created_at' => '2019-04-22 02:04:50',
                'updated_at' => '2019-05-05 00:37:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dell OptiPlex 7060',
                'image' => '/images/OptiPlex_7060.jpg',
                'specs' => NULL,
                'category_id' => 2,
                'created_at' => '2019-04-22 02:08:22',
                'updated_at' => '2019-04-22 02:08:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'HP EliteBook Notebook PC 1040 G3',
                'image' => '/images/HP_EliteBook_Notebook_PC_1040_G3.jpg',
                'specs' => NULL,
                'category_id' => 1,
                'created_at' => '2019-04-22 02:29:43',
                'updated_at' => '2019-05-05 00:20:58',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'HP Compaq 8300 Elite series PC 8300 SFF',
                'image' => '/images/HP_Compaq_8300_Elite_series_PC_8300_SFF.jpg',
                'specs' => NULL,
                'category_id' => 2,
                'created_at' => '2019-04-22 02:34:47',
                'updated_at' => '2019-04-22 02:34:47',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'HP Elite Desktop PC 8200 SFF',
                'image' => '/images/HP_Elite_Desktop_PC_8200_SFF.gif',
                'specs' => NULL,
                'category_id' => 2,
                'created_at' => '2019-04-22 02:35:46',
                'updated_at' => '2019-04-22 02:35:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'HP EliteBook Notebook PC 8470p',
                'image' => 'images/no-image.jpg',
                'specs' => NULL,
                'category_id' => 1,
                'created_at' => '2019-04-22 02:36:23',
                'updated_at' => '2019-04-22 02:36:23',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Dell Latitude E7470',
                'image' => 'images/no-image.jpg',
                'specs' => NULL,
                'category_id' => 1,
                'created_at' => '2019-04-22 02:37:18',
                'updated_at' => '2019-04-22 02:37:18',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Dell Latitude 7490',
                'image' => 'images/no-image.jpg',
                'specs' => NULL,
                'category_id' => 1,
                'created_at' => '2019-04-22 02:42:58',
                'updated_at' => '2019-04-22 02:42:58',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'HP EliteBook Notebook PC 8460p',
                'image' => 'images/no-image.jpg',
                'specs' => NULL,
                'category_id' => 1,
                'created_at' => '2019-04-22 03:03:04',
                'updated_at' => '2019-04-22 03:03:04',
            ),
        ));
        
        
    }
}