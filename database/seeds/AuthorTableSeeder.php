<?php

use Illuminate\Database\Seeder;
require_once 'vendor/autoload.php';
use App\Author;

class AuthorTableSeeder extends Seeder
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

        for($i=1; $i<12; $i+=1){
            Author::create([
            'name'=>$faker->name,
            'sex'=>'male',
            'dob'=>$faker->date,
            'pob'=>$faker->city,
            'education'=>$faker->name,
            'book_authored'=>$faker->numberBetween($min=1, $max=5),
            'photo'=>$faker->image,
            'email'=>$faker->email,
            'twitter'=>$faker->url,
            'instagram'=>$faker->url,
            'linkin'=>$faker->url,
            'biography' =>$faker->realText($maxNbChars = 300, $indexSize = 2),
            ]);
        }
    }
}
