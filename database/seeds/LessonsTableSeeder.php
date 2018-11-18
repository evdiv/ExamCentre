<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'exam_id' => 1,
            'user_id' => 1,
            'order_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('lessons')->insert([
            'exam_id' => 3,
            'user_id' => 2,
            'order_id' => 2,
            'created_at' => Carbon::now()->subHours(3)->format('Y-m-d H:i:s')
        ]);
    }
}
