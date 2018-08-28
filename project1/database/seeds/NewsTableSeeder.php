<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'khuyen mai tan sinh vien 2018!',
                'content' => 'giam gia 30% tat ca cac mat hang',
                'slug' => Str::slug('khuyen mai tan sinh vien 2018!', '-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'mua 2 tang 1',
                'content' => 'ap dung ngay 1/8 - 10/8',
                'slug' => Str::slug('mua 2 tang 1', '-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'thay man hinh mien phi',
                'content' => 'ap dung cho dien thoai iphone',
                'slug' => Str::slug('thay man hinh mien phi', '-'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
