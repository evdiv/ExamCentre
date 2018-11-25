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
            'created_at' => Carbon::now()->subHours(15)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Second Real Exam',
            'src' => 'second-exam.mp4',
            'description' => 'This is the second real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(13)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Third Real Exam',
            'src' => 'third-exam.mp4',
            'description' => 'This is the third real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(12)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Fourth Real Exam',
            'src' => 'fourth-exam.mp4',
            'description' => 'This is the fourth real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(11)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Fifth Real Exam',
            'src' => 'fifth-exam.mp4',
            'description' => 'This is the fifth real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(10)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Sixth Real Exam',
            'src' => 'sixth-exam.mp4',
            'description' => 'This is the sixth real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(9)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'Seventh Real Exam',
            'src' => 'seventh-exam.mp4',
            'description' => 'This is the seventh real exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(8)->format('Y-m-d H:i:s')
        ]);


    }
}
