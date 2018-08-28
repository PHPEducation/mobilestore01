<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorizablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorizables')->insert([
            [
                'category_id' => 1,
                'categorizable_id' => 3,
                'categorizable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 2,
                'categorizable_id' => 1,
                'categorizable_type' => 'App\Accessory',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 3,
                'categorizable_id' => 2,
                'categorizable_type' => 'App\Product',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
