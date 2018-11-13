<?php

use Illuminate\Database\Seeder;

class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert([
            'name' => 'Student'
        ]);

        DB::table('occupations')->insert([
            'name' => 'Worker'
        ]);

        DB::table('occupations')->insert([
            'name' => 'Other'
        ]);
    }
}
