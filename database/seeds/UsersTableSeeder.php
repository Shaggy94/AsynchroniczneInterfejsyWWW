<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use \App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name','Admin')->first();
        $normalUser = Role::where('name','User')->first();

        $faker = \Faker\Factory::create();

        $user = new \App\User();
        $user->name='Borys Glejzer';
        $user->email='borys.glejzer@gmail.com';
        $user->password=bcrypt('Krasnoludek@1');
        $user->save();

        $user->roles()->attach($admin);
        $user->roles()->attach($normalUser);

        $user = new \App\User();
        $user->name='Test User';
        $user->email='user@test.com';
        $user->password=bcrypt('user');
        $user->save();
        $user->roles()->attach($normalUser);

        for($i=0;$i<100;$i++){
            $user = new \App\User();
            $user->name=$faker->name;
            $user->email=$faker->email;
            $user->password=bcrypt('user');
            $user->save();

            $user->roles()->attach($normalUser);
        }
    }
}
