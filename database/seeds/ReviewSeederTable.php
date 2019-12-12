<?php

use Illuminate\Database\Seeder;
require_once 'vendor/autoload.php';
use App\Review;

class ReviewSeederTable extends Seeder
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
        for ($i = 1; $i < 11; $i++) {
            Review::create([
               
                'user_id' =>$i,
                'publish_id' =>$faker->numberBetween($min = 1, $max = 10),
                'subject'=>$faker->text,
                'comment' => $faker->text,
                'ratings' => $faker->numberBetween($min = 1, $max = 5),
                
            ]);
        }
    }
}
