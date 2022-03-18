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
                'id'=>1,
                'name' => 'user-list',
                'description' => 'Danh sách user',
            ], 
            [
                'id'=>2,
                'name' => 'user-add',
                'description' => 'Thêm user',
            ], 
            [
                'id'=>3,
                'name' => 'user-edit',
                'description' => 'Cập nhật user',
            ], 
            [
                'id'=>4,
                'name' => 'user-delete',
                'description' => 'Xóa user',
            ], 
            [
                'id'=>5,
                'name' => 'room-list',
                'description' => 'Danh sách phòng ban',
            ], 
            [
                'id'=>6,
                'name' => 'room-add',
                'description' => 'Thêm phòng ban',
            ], 
            [
                'id'=>7,
                'name' => 'room-edit',
                'description' => 'Cập nhật phòng ban',
            ], 
            [
                'id'=>8,
                'name' => 'room-delete',
                'description' => 'Xóa phòng ban',
            ], 
        ]);
    }
}
