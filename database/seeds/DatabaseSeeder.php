<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ExamsTableSeeder::class,
            LessonsTableSeeder::class,
            OccupationsTableSeeder::class,
            OrdersTableSeeder::class,
            OrderTypesTableSeeder::class,
            SubscriptionsTableSeeder::class,
            TransactionsTableSeeder::class,
            UsersTableSeeder::class,
            EvaluationsTableSeeder::class
        ]);
    }
}
