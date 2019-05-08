<?php

use Illuminate\Database\Seeder;

class AssetUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asset_user')->delete();
        
        \DB::table('asset_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'req_num' => 'REQ401936',
                'user_id' => 2,
                'modelname_id' => 8,
                'asset_id' => NULL,
                'status_id' => 6,
                'created_at' => '2019-05-06 00:24:03',
                'updated_at' => '2019-05-06 16:41:53',
            ),
            1 => 
            array (
                'id' => 2,
                'req_num' => 'REQ813502',
                'user_id' => 2,
                'modelname_id' => 1,
                'asset_id' => 1,
                'status_id' => 5,
                'created_at' => '2019-05-06 00:25:24',
                'updated_at' => '2019-05-06 17:31:27',
            ),
            2 => 
            array (
                'id' => 3,
                'req_num' => 'REQ129854',
                'user_id' => 2,
                'modelname_id' => 3,
                'asset_id' => NULL,
                'status_id' => 6,
                'created_at' => '2019-05-06 00:25:52',
                'updated_at' => '2019-05-06 16:42:04',
            ),
            3 => 
            array (
                'id' => 4,
                'req_num' => 'REQ356481',
                'user_id' => 2,
                'modelname_id' => 2,
                'asset_id' => 2,
                'status_id' => 5,
                'created_at' => '2019-05-06 14:25:27',
                'updated_at' => '2019-05-06 17:34:55',
            ),
            4 => 
            array (
                'id' => 5,
                'req_num' => 'REQ140582',
                'user_id' => 2,
                'modelname_id' => 2,
                'asset_id' => 2,
                'status_id' => 5,
                'created_at' => '2019-05-06 14:26:38',
                'updated_at' => '2019-05-06 16:48:32',
            ),
            5 => 
            array (
                'id' => 6,
                'req_num' => 'REQ428531',
                'user_id' => 3,
                'modelname_id' => 9,
                'asset_id' => 16,
                'status_id' => 5,
                'created_at' => '2019-05-06 14:36:51',
                'updated_at' => '2019-05-06 17:34:57',
            ),
            6 => 
            array (
                'id' => 7,
                'req_num' => 'REQ260879',
                'user_id' => 3,
                'modelname_id' => 2,
                'asset_id' => 2,
                'status_id' => 5,
                'created_at' => '2019-05-06 14:36:54',
                'updated_at' => '2019-05-06 16:49:19',
            ),
            7 => 
            array (
                'id' => 8,
                'req_num' => 'REQ102975',
                'user_id' => 3,
                'modelname_id' => 8,
                'asset_id' => 13,
                'status_id' => 5,
                'created_at' => '2019-05-06 17:41:55',
                'updated_at' => '2019-05-06 17:42:59',
            ),
            8 => 
            array (
                'id' => 9,
                'req_num' => 'REQ726984',
                'user_id' => 3,
                'modelname_id' => 1,
                'asset_id' => NULL,
                'status_id' => 6,
                'created_at' => '2019-05-06 17:43:31',
                'updated_at' => '2019-05-06 17:43:45',
            ),
            9 => 
            array (
                'id' => 10,
                'req_num' => 'REQ628174',
                'user_id' => 3,
                'modelname_id' => 7,
                'asset_id' => NULL,
                'status_id' => 6,
                'created_at' => '2019-05-06 17:43:34',
                'updated_at' => '2019-05-06 17:44:02',
            ),
            10 => 
            array (
                'id' => 11,
                'req_num' => 'REQ084961',
                'user_id' => 2,
                'modelname_id' => 6,
                'asset_id' => 6,
                'status_id' => 5,
                'created_at' => '2019-05-06 17:45:09',
                'updated_at' => '2019-05-06 17:45:53',
            ),
            11 => 
            array (
                'id' => 12,
                'req_num' => 'REQ753024',
                'user_id' => 2,
                'modelname_id' => 3,
                'asset_id' => NULL,
                'status_id' => 6,
                'created_at' => '2019-05-06 17:45:32',
                'updated_at' => '2019-05-06 17:46:53',
            ),
            12 => 
            array (
                'id' => 13,
                'req_num' => 'REQ962401',
                'user_id' => 2,
                'modelname_id' => 3,
                'asset_id' => 3,
                'status_id' => 5,
                'created_at' => '2019-05-06 17:46:25',
                'updated_at' => '2019-05-06 17:46:59',
            ),
        ));
        
        
    }
}