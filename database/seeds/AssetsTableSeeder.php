<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assets')->delete();
        
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sn' => '1TRLXG2',
                'modelname_id' => 1,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:07:51',
                'updated_at' => '2019-05-06 17:31:27',
            ),
            1 => 
            array (
                'id' => 2,
                'sn' => 'HC3WMD2',
                'modelname_id' => 2,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:08:31',
                'updated_at' => '2019-05-06 17:34:55',
            ),
            2 => 
            array (
                'id' => 3,
                'sn' => '5CD618051Q',
                'modelname_id' => 3,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:33:34',
                'updated_at' => '2019-05-06 17:46:58',
            ),
            3 => 
            array (
                'id' => 4,
                'sn' => 'MXL3331S5W',
                'modelname_id' => 4,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:35:03',
                'updated_at' => '2019-04-22 02:35:03',
            ),
            4 => 
            array (
                'id' => 5,
                'sn' => 'MXL1520Y6L',
                'modelname_id' => 5,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:35:57',
                'updated_at' => '2019-04-22 02:35:57',
            ),
            5 => 
            array (
                'id' => 6,
                'sn' => 'CNU319BTBC',
                'modelname_id' => 6,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:36:44',
                'updated_at' => '2019-05-06 17:45:53',
            ),
            6 => 
            array (
                'id' => 7,
                'sn' => '1CKNMF2',
                'modelname_id' => 7,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:37:31',
                'updated_at' => '2019-04-22 02:37:31',
            ),
            7 => 
            array (
                'id' => 8,
                'sn' => '16TMMF2',
                'modelname_id' => 7,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:37:43',
                'updated_at' => '2019-04-22 02:37:43',
            ),
            8 => 
            array (
                'id' => 9,
                'sn' => 'MXL4031141',
                'modelname_id' => 4,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:38:18',
                'updated_at' => '2019-04-22 02:38:18',
            ),
            9 => 
            array (
                'id' => 10,
                'sn' => 'CNU335BZXV',
                'modelname_id' => 6,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:38:43',
                'updated_at' => '2019-04-22 02:38:43',
            ),
            10 => 
            array (
                'id' => 11,
                'sn' => '1TSKXG2',
                'modelname_id' => 1,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:41:10',
                'updated_at' => '2019-04-22 02:41:10',
            ),
            11 => 
            array (
                'id' => 12,
                'sn' => 'MXL1520Y6K',
                'modelname_id' => 5,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:41:56',
                'updated_at' => '2019-04-22 02:41:56',
            ),
            12 => 
            array (
                'id' => 13,
                'sn' => 'BX6JVT2',
                'modelname_id' => 8,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:43:13',
                'updated_at' => '2019-05-06 17:42:59',
            ),
            13 => 
            array (
                'id' => 14,
                'sn' => '43S2WT2',
                'modelname_id' => 8,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:43:27',
                'updated_at' => '2019-05-06 15:23:37',
            ),
            14 => 
            array (
                'id' => 15,
                'sn' => '807JVT2',
                'modelname_id' => 8,
                'status_id' => 1,
                'created_at' => '2019-04-22 02:43:41',
                'updated_at' => '2019-04-22 02:43:41',
            ),
            15 => 
            array (
                'id' => 16,
                'sn' => 'CNU1480TF8',
                'modelname_id' => 9,
                'status_id' => 1,
                'created_at' => '2019-04-22 03:03:27',
                'updated_at' => '2019-05-06 17:34:57',
            ),
        ));
        
        
    }
}