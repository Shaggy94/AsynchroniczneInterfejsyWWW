<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use \App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0;$i<500;$i++){
            $book = new Book();
            $book->title=$faker->sentence($nbWords = $faker->numberBetween($min = 1, $max = 6), $variableNbWords = true) ;
            $book->isbn=$faker->isbn13;
            $book->publ_date=$faker->date($format = 'Y-m-d', $max = 'now');
            $book->publ_house=$faker->word;
            $book->description=$faker->realText($faker->numberBetween(300,500));
            $book->save();
            $book->authors()->attach($faker->numberBetween($min = 1, $max = 50));
            $book->categories()->attach($faker->numberBetween($min = 1, $max = 11));
            // $book->store()->attach($faker->numberBetween($min = 1, $max = 50));
        }
    }
}
