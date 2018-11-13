<?php

use Illuminate\Database\Seeder;

class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_types')->insert([
            'name' => 'Exams'
        ]);

        DB::table('order_types')->insert([
            'name' => 'Evaluations'
        ]);
    }
}
