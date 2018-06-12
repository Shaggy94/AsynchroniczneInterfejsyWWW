<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $cat = new \App\Category();
        $cat->name='Sci-Fi';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Fantastyka';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Romans';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Komedia';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Historyczna';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Dokument';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Powieść';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Horror';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Epika';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Dramat';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();

        $cat = new \App\Category();
        $cat->name='Nauka';
        $cat->description=$faker->realText($faker->numberBetween(300,500));
        $cat->save();
    }
}
