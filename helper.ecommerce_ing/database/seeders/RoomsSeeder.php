<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                    'title'=>'Phòng kỹ thuật',
                    'des'=>"Chua co noi dung",
            ], 
            [
                'title'=>'Phòng kế toán',
                'des'=>"Chua co noi dung",
            ], 
            [
                'title'=>'Phòng kinh doanh',
                'des'=>"Chua co noi dung",
            ], 
        ]);
    }
}
