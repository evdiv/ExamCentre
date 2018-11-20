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
            'title' => 'Demo lesson',
            'description' => 'This subscription is typically using for demo purposes.',
            'price' => 0,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '1 Lesson',
            'description' => 'This subscription is for users who want to increase their language skills and save money.',
            'price' => 5.99,
            'exams' => 1,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '3 Lesson',
            'description' => 'This subscription is for users who want to increase their language skills and save money.',
            'price' => 14.49,
            'exams' => 3,
            'active' => 1
        ]);


        DB::table('subscriptions')->insert([
            'title' => '5 Lesson',
            'description' => 'This subscription is for users who want to get significant improvement in their language skills fast',
            'price' => 22.49,
            'exams' => 5,
            'active' => 1
        ]);
    }
}
