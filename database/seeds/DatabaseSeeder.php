<?php

use Illuminate\Database\Seeder;

require 'vendor/autoload.php';

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        //  $this->call(ReviewSeederTable::class);
        //  $this->call(PublishTableSeeder::class);
         // $this->call(AuthorTableSeeder::class);
         // $this->call(CategoryTableSeeder::class);
    }
}
