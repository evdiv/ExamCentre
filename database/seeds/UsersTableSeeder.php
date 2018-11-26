<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'country' => 'Canada',
            'email' => 'eugene@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 1,
            'created_at' => Carbon::now()->subHours(2)->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'active' => 1,
            'name' => 'Kyle',
            'city' => 'Moscow',
            'country' => 'Russia',
            'email' => 'kyle@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 2,
            'created_at' => Carbon::now()->subHours(4)->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'active' => 1,
            'name' => 'Mike',
            'city' => 'Kiev',
            'country' => 'Ukraine',
            'email' => 'mike@test.ca',
            'password' => bcrypt('secret'),
            'occupation_id' => 3,
            'created_at' => Carbon::now()->subHours(3)->format('Y-m-d H:i:s')
        ]);

    }
}
