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
    }
}
