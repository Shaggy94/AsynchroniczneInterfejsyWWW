<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new \App\Role();
        $cat->name='Admin';
        $cat->save();

        $cat = new \App\Role();
        $cat->name='User';
        $cat->save();

        $cat = new \App\Role();
        $cat->name='Banned';
        $cat->save();
    }
}
