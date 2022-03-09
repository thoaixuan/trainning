<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group')->insert([
            [
                'group_name' => 'Group IT',
                'phongban_id' => '1',
                'position_id' => '1',
                'user_id' => '1'
            ]
        ]);
    }
}
