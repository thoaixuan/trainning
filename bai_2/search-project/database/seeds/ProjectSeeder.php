<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'user_id' => 1,
                'service_id'=>1 ,
                'projects_name'=>"Ung dung nghe nhac",
                'projects_detail'=>"Chưa có dữ liệu",
                'status'=>0
            ],
        ]);
    }
}
