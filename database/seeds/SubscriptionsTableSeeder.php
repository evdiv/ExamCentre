<?php

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'title' => 'Demo Speaking Exam',
            'description' => 'Demo exam consist the first part of the Speaking Section. You can take is as many times as you want. Although you will not be able send your recording for evaluation you will get solid understanding how our service works.',
            'price' => 0,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '1 Speaking Exam',
            'description' => 'This is a complete IELTS Speaking Exam. It will get you the full understending of what to expect on the real exam and type of questions that are being asked. You can take it as many times as you wish.',
            'price' => 5.99,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '3 Speaking Exams',
            'description' => 'If you think you will need more than one exam for preparation we have a good deal for you. This package consist of three different Speaking Exams. You can take each exam as many times as you want. ' ,
            'price' => 14.49,
            'exams' => 3,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '5 Speaking Exams',
            'description' => 'If you think you will need more than three exams for preparation we have a package consists of five different Speaking Exams. Taking all of them will significantly improve your score on the real live exam.',
            'price' => 22.49,
            'exams' => 5,
            'active' => 1
        ]);
    }
}
