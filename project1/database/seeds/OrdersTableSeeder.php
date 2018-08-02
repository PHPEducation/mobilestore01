<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            [
                'total' => 1000000,
                'user_id' => 2,
                'name' => 'hd1',
                'email' => str_random(3)."@gmail.com",
                'address' => str_random(10),
                'phone' => '113',
                'mode_of_payment_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'total' => 1600000,
                'user_id' => 1,
                'name' => 'hd2',
                'email' => str_random(3)."@gmail.com",
                'address' => str_random(10),
                'phone' => '114',
                'mode_of_payment_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'total' => 1000000,
                'user_id' => 2,
                'name' => 'hd3',
                'email' => str_random(3)."@gmail.com",
                'address' => str_random(10),
                'phone' => '117',
                'mode_of_payment_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
