<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['content'=>'عالی بود متشکرم','post_id'=>'1'] ,
            ['content'=>'عالی بود ','post_id'=>'2'] ,
            ['content'=>'عالی بود تشکر تشکر','post_id'=>'2'] ,
            ['content'=>'عالی ','post_id'=>'3'] ,
        ]);
    }
}
