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
            'title' => 'First subscription',
            'description' => 'This subscription is typically using for demo purposes.',
            'price' => 0.99,
            'exams' => 1,
            'active' => 1
        ]);

        DB::table('subscriptions')->insert([
            'title' => 'Second subscription',
            'description' => 'This subscription is for users who want to increase their language skills and save money.',
            'price' => 3.99,
            'exams' => 3,
            'active' => 1
        ]);

        DB::table('subscriptions')->insert([
            'title' => 'Third subscription',
            'description' => 'This subscription is for users who want to get significant improvement in their language skills fast',
            'price' => 7.99,
            'exams' => 5,
            'active' => 1
        ]);
    }
}
