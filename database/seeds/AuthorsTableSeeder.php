<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use \App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for($i=0;$i<50;$i++){
            $author = new Author();
            $author->first_name=$faker->firstName($gender = null);
            $author->last_name=$faker->lastName;
            $author->description=$faker->realText($faker->numberBetween(300,500));

            $author->save();
        }
    }
}
