<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'title' => 'Mua Sắm Cùng eGate',
                'url' => '#',
                'icon' => 'fe fe-home',
                'color' => 'bg-primary'
            ], 
            [
                'title' => 'Thanh Toán',
                'url' => '#',
                'icon' => 'fe fe-grid',
                'color' => 'bg-teal'
            ], 
            [
                'title' => 'Trả hàng & Hoàn Tiền',
                'url' => '#',
                'icon' => 'fe fe-shopping-cart',
                'color' => 'bg-info'
            ], 
            [
                'title' => 'Khuyến Mãi & Ưu Đãi',
                'url' => '#',
                'icon' => 'fe fe-credit-card',
                'color' => 'bg-danger'
            ], 
        ]);
    }
}
