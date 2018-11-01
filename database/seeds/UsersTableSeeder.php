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
            'name' => str_random(6),
            'city' => str_random(5),
            'age' => rand(15, 50),
            'email' => str_random(5).'@gmail.com',
            'password' => bcrypt('secret'),
            'occupation_id' => 1
        ]);
    }
}
