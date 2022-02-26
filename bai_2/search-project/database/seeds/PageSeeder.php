<?php

use Illuminate\Database\Seeder;

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
                'id' => 1,
                'name'=>"Trung tâm trợ giúp" ,
                'key'=>"TRO_GIUP",
                'type_open'=>0,
                'status'=>0,
                'content'=>"<p>Chưa có thông tin</p>"
            ],
            [
                'id' => 2,
                'name'=>"An toàn mua bán" ,
                'key'=>"AN_TOAN_MUA_BAN",
                'type_open'=>0,
                'status'=>0,
                'content'=>"<p>Chưa có thông tin</p>"
            ],
            [
                'id' => 3,
                'name'=>"Quy định cần biết" ,
                'key'=>"QUY_DINH_CAN_BIET",
                'type_open'=>0,
                'status'=>0,
                'content'=>"<p>Chưa có thông tin</p>"
            ],
        ]);
    }
}
