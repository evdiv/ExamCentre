<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'user_id' => 1,
            'amount' => 0,
            'complete' => 1,
            'created_at' => Carbon::now()->subHours(1)->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'user_id' => 2,
            'amount' => 5.99,
            'complete' => 1,
            'created_at' => Carbon::now()->subHours(2)->format('Y-m-d H:i:s')
        ]);
    }
}
