<?php

use Illuminate\Database\Seeder;
require_once 'vendor/autoload.php';
use App\Publish;


class PublishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 1; $i < 30; $i++) {
            Publish::create([
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
           'author_id' => $faker->numberBetween($min = 1, $max = 10),
            'title' => $faker->name,
            'isbn' => $faker->e164PhoneNumber,
            'price'=>$faker->numberBetween($min = 100, $max=1000),
            'available'=>$faker->numberBetween($min =1, $max=2),
            'content' =>$faker->realText($maxNbChars = 150, $indexSize = 2),
            'cover_page'=>$faker->image,
            
            'status'=>$faker->numberBetween($min =1, $max=2),

            'description' =>$faker->text,

            'year_pub'=>$faker->date
            ]);
        }
    }
}
