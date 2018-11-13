<?php

use Illuminate\Database\Seeder;

class ShoppingCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shopping_carts')->insert([
            'exam_id' => 1,
            'user_id' => 1,
            'order_id' => 1
        ]);

        DB::table('shopping_carts')->insert([
            'exam_id' => 3,
            'user_id' => 2,
            'order_id' => 2
        ]);
    }
}
