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
            'description' => 'The demo exam includes only the first part of the IELTS speaking section. Although you will not be able to send your records for evaluation, you will gain a solid understanding of how our service works.',
            'price' => 0,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '1 Speaking Exam',
            'description' => 'This is a complete IELTS speaking exam. It will give you a full understanding of what to expect on the real exam and the types of questions being asked. You can take it as many times as you wish.',
            'price' => 5.99,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '3 Speaking Exams',
            'description' => 'If you think you will need to take more than one exam to prepare, we have a good deal for you. This package consists of three different speaking exams. You can take each exam as many times as you want.' ,
            'price' => 14.49,
            'exams' => 3,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '5 Speaking Exams',
            'description' => 'If you think you will need more than three exams to prepare, we have a package consists of five different speaking exams. Taking all of them will significantly improve your score on the real IELTS test.',
            'price' => 22.49,
            'exams' => 5,
            'active' => 1
        ]);
    }
}
