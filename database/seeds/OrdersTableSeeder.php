<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'order_type_id' => 1,
            'transaction_id' => 1
        ]);

        DB::table('orders')->insert([
            'user_id' => 2,
            'order_type_id' => 1,
            'transaction_id' => 2
        ]);
    }
}
