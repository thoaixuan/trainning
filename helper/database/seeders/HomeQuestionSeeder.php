<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HomeQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'title' => 'Mua sắm an toàn cùng e-Gate',
                'des' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat, sunt quaerat eos ab quos assumenda quidem',
            ], 
            [
                'title' => 'Voucher/Mã giảm giá',
                'des' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fugiat, sunt quaerat eos ab quos assumenda quidem',
            ], 
        ]);
    }
}
