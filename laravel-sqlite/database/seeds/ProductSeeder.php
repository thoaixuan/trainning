<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'name' => 'iPhone SE 2022 | Chính hãng VN/A',
                'price' => '13000000',
                'qty' => 2,
                'description' => 'iPhone SE 2022 được trang bị mặt kính cường lực ở cả hai mặt trước và sau'
            ],
            [
                'name' => 'iPhone 13 mini | Chính hãng VN/A',
                'price' => '20000000',
                'qty' => 2,
                'description' => 'Máy vẫn có phiên bản khung viền thép, một số phiên bản khung nhôm cùng mặt lưng kính'
            ],
        ]);
    }
}
