<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => str_random(5),
                'email' => str_random(5)."@gmail.com",
                'password' => str_random(8),
                'address' => 'Ha Noi',
                'phone' => '113',
                'role_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => str_random(5),
                'email' => str_random(5)."@gmail.com",
                'password' => str_random(8),
                'address' => 'Sai Gon',
                'phone' => '114',
                'role_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => str_random(5),
                'email' => str_random(5)."@gmail.com",
                'password' => str_random(8),
                'address' => 'Da Nang',
                'phone' => '115',
                'role_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
