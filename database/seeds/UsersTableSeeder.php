<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "tImsmek",
            'email' => 'onyebuchitim@gmail.com',
            'password' => bcrypt('tImsmek1'),
            'isAdmin' => 1,
            'phone'=> '07034559895',
            'newslater'=>1,
            'agree'=> 1,
            'role' =>'Admin',

        ]);DB::table('users')->insert([
            'name' => "Emmanuel",
            'email' => 'ikeogu322@gmail.com',
            'password' => bcrypt('123456789'),
            'isAdmin' => 1,
            'phone'=> '08133627610',
            'newslater'=>1,
            'agree'=> 1,
            'role' =>'Admin',

        ]);
        


    }
}
