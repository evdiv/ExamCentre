<?php

use Illuminate\Database\Seeder;

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
            'views' => 0
        ]);

        DB::table('exams')->insert([
            'title' => 'First Real Exam',
            'src' => 'first-exam.mp4',
            'description' => 'This is the first real exam',
            'views' => 0
        ]);

        DB::table('exams')->insert([
            'title' => 'Second Real Exam',
            'src' => 'second-exam.mp4',
            'description' => 'This is the second real exam',
            'views' => 0
        ]);

    }
}
