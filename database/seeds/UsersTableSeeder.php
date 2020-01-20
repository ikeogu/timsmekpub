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
            'name' => "Chisom Osuji",
            'email' => 'chisom@gmail.com',
            'password' => bcrypt('chisom'),
            'isAdmin' => 1,
            'phone'=> '07034559895',
            
            'agree'=> 1,
            'mode'=>'daily',
            'referrer_id'=> 1,
            'status'=>1,
            'acct_bal'=>100,
            'username' => 'chizzy',
            'amount'=>2000,
            'email_verified_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

    }
}
