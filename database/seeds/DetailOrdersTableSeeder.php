<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DetailOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_orders')->insert([
            [
                'quantity' => 25,
                'price' => 35000,
                'order_id' => 4,
                'detail_orderable_id' => 5,
                'detail_orderable_type' => 'App\product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'quantity' => 35,
                'price' => 70000,
                'order_id' => 6,
                'detail_orderable_id' => 6,
                'detail_orderable_type' => ' App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'quantity' => 55,
                'price' => 20000,
                'order_id' => 5,
                'detail_orderable_id' => 4,
                'detail_orderable_type' =>  'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
