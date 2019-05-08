<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Optimus Prime',
                'email' => 'optimus.prime@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qB0ErLQFtkN3piJj9tLnleVUO8OWHlll3LH1keXL8uMeLlMz1jEW2',
                'is_admin' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-04-14 05:54:52',
                'updated_at' => '2019-04-14 05:54:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'John Doe',
                'email' => 'john.doe@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cV5iTvYM6b7/mmKMfJ6KMOnGd82yA180yj36dDRzO7OdF64CaRIp2',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-05 00:39:46',
                'updated_at' => '2019-05-05 00:39:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Peter Parker',
                'email' => 'peter.parker@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$gZ1Tx7vPd3QX0wiHoQTEFuQUE.6smEMRj4fuKWO2k.Hc58QaAw9KK',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 14:36:20',
                'updated_at' => '2019-05-06 14:36:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Night Crawler',
                'email' => 'night.crawler@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4iM1eyhoxIoghl1Dotog7eNUqIhthDQETcfsMECDLNs37Aapvlkou',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 17:13:09',
                'updated_at' => '2019-05-06 17:13:09',
            ),
        ));
        
        
    }
}