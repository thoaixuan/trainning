<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedderPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = array(
            'create'=>1,
            'update'=>1,
            'delete'=>1,
            'view'=>1,
        );
        $json_read = '{"create":0,"update":0,"delete":0,"view":1}';
        DB::table('permissions')->insert([
            [
                'name' => 'Tất cả các quyền',
                'description' => 'Thêm sửa xóa dữ liệu',
                'action'=>json_encode($json,true),
            ], 
            [
                'name' => 'Chỉ có quyền đọc dữ liệu',
                'description' => 'Chỉ đọc dữ liệu',
                'action'=>json_encode($json_read),

            ], 
        ]);
    }
}
