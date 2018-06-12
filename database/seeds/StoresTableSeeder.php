<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use \App\Store;

class StoresTableSeeder extends Seeder
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
            $store = new Store();
            $store->book_id=$i+1;
            $store->books_count=$faker->randomDigitNotNull;
            $store->save();
        }
    }
}
