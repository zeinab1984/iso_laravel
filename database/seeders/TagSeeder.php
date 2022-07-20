<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['title'=>'php','created_at'=>now()],
            ['title'=>'go','created_at'=>now()],
            ['title'=>'java','created_at'=>now()],
            ['title'=>'phyton','created_at'=>now()],
            ['title'=>'c#','created_at'=>now()],
            ]);
    }
}
