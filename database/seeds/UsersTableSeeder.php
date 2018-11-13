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
            'active' => 1,
            'name' => 'Eugene',
            'city' => 'Toronto',
            'age' => 23,
            'email' => 'eugene@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 1
        ]);


        DB::table('users')->insert([
            'active' => 1,
            'name' => 'Kyle',
            'city' => 'London',
            'age' => 27,
            'email' => 'kyle@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 2
        ]);


        DB::table('users')->insert([
            'active' => 1,
            'name' => 'Mike',
            'city' => 'Toronto',
            'age' => 35,
            'email' => 'mike@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 3
        ]);

    }
}
