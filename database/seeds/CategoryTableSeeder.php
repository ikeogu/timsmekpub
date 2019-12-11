<?php

use Illuminate\Database\Seeder;
require_once 'vendor/autoload.php';
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 1; $i < 10; $i++) {
            Category::create([
            'name'=>$faker->name,
            'description'=>$faker->text
            ]);
        }
    }    
}
