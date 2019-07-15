<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => "adeo",
            'email' => "adeo@adeo.com",
            'password' => bcrypt('password'),
        ]);
    }
}
