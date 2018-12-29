<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluations')->insert([
            'mark' => 0
        ]);

        DB::table('evaluations')->insert([
            'mark' => 6.5
        ]);
    }
}