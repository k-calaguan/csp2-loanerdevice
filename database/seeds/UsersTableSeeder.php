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
            4 => 
            array (
                'id' => 5,
                'name' => 'Tony Stark',
                'email' => 'tony.stark@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qdK49QEoz9OdAWh5qxff9.RVnlZXUZxwsMTKYOwGry4A9.hsDYQym',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:13:28',
                'updated_at' => '2019-05-06 18:13:28',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Robert Bruce Banner',
                'email' => 'robertbruce.banner@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$smuxOxzqLqSmKU2wfWVY6u6fqi1fxfg2NNTyLz.0J9uQFsuA.NJKy',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:14:12',
                'updated_at' => '2019-05-06 18:14:12',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Steve Rogers',
                'email' => 'steve.rogers@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lu8U94I.Ve4z8E37sZtgXOzGOFyd7mVOS81y23m8fb31CkYZKCmnC',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:14:38',
                'updated_at' => '2019-05-06 18:14:38',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jennifer Walters',
                'email' => 'jennifer.walters@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$suk6.2J.NnMnMynlN2wYJOVyTA3RDUy9eTeg92nNPh5Gdqz6W9dNq',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:15:52',
                'updated_at' => '2019-05-06 18:15:52',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Stephen Strange',
                'email' => 'stephen.strange@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$L31qF5vGCG3pmOgUbkx4zuYHzikm5y/CJRMf3naKFYh40nZatRKoK',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:18:15',
                'updated_at' => '2019-05-06 18:18:15',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pietro Maximoff',
                'email' => 'pietro.maximoff@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TornMdQDtdjUn7kHVm7DIuWNw47vxHtILDzAqZMAqg0fh7pqw397i',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:19:00',
                'updated_at' => '2019-05-06 18:19:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Clint Barton',
                'email' => 'clint.barton@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$crY2iJhonEAcUAMDJ.MjBelsQNXcD0iZQbpXuf74RvSmxY5OUQUg6',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:24:05',
                'updated_at' => '2019-05-06 18:24:05',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'T Challa',
                'email' => 't.challa@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0TVNccwB1CMtfv05Tmj6geP/DOA97jnp8zmd7lFQIDXoUuvOeGCmC',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:24:26',
                'updated_at' => '2019-05-06 18:24:26',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Frank Castle',
                'email' => 'frank.castle@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$aI5vPv8UF1C0dAtivafpm.DIkUn2zgFVq7nk0fRjiRke2aBJkbP.u',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:24:57',
                'updated_at' => '2019-05-06 18:24:57',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Bruce Wayne',
                'email' => 'bruce.wayne@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cKk6ZeIrsOjuSrozQBXeru7Jn/GJgY/klHBb.JdnSr./D5EAYH13i',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:25:10',
                'updated_at' => '2019-05-06 18:25:10',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Jessica Jones',
                'email' => 'jessica.jones@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$hcGEUSRCeRbw4OiHr3FSOu68lNVYPRNwccLgLiSjNFD.1lJb0Vs4.',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:25:35',
                'updated_at' => '2019-05-06 18:25:35',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Luke Cage',
                'email' => 'luke.cage@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Ib8NpukXgkAsv4m7qGq8BOHpGfvUd3Ds6yBfXnuUWgGqiPX73qsVK',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:25:49',
                'updated_at' => '2019-05-06 18:25:49',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Nicolas Travis',
                'email' => 'nicolas.travis@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DIrJRR2MQhDbh0tfQfnPPOxgDiOmZA//DdMspGsizF7qPdQi33Com',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:28:12',
                'updated_at' => '2019-05-06 18:28:12',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Scott Summers',
                'email' => 'scott.summers@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$M2mJT0SlsX8Km4JkU8e/jOiih.NTAYY9.Yc7GErJN5WXMC7.kr842',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:29:22',
                'updated_at' => '2019-05-06 18:29:22',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'James Logan Howlett',
                'email' => 'jameslogan.howlett@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$UAQR4sw1HHVv1dWmyeu.fuBMIdcjWBCun.K.yhEknY1BS/v03mL5i',
                'is_admin' => 2,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 18:39:51',
                'updated_at' => '2019-05-06 18:39:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Batman',
                'email' => 'batman@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zCv97sZU7udufYOx/7YFZOgz60sNmBfs7ZRBPcdaI5dFgBbxi0sSi',
                'is_admin' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-05-06 19:38:45',
                'updated_at' => '2019-05-06 19:38:45',
            ),
        ));
        
        
    }
}