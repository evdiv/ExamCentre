<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
            'title' => 'Demo Exam',
            'src' => 'demo.mp4',
            'description' => 'This is a free demo exam',
            'views' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'First Real Exam',
            'src' => 'first-exam.mp4',
            'description' => 'This is the first real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(5)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Second Real Exam',
            'src' => 'second-exam.mp4',
            'description' => 'This is the second real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(3)->format('Y-m-d H:i:s')
        ]);

    }
}
