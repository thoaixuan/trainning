<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'name' => 'Giới thiệu',
                'slug' => 'gioi-thieu',
                'content' => '<p>Chưa có nội dung</p></p>',
            ], 
            [
                'name' => 'Trung tâm trợ giúp',
                'slug' => 'trung-tam-tro-giup',
                'content' => '<p>Chưa có nội dung</p></p>',
            ], 
            [
                'name' => 'Chính sách',
                'slug' => 'chinh-sach',
                'content' => '<p>Chưa có nội dung</p></p>',
            ], 
        ]);
    }
}
