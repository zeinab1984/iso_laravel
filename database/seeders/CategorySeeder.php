<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           ['title'=>'اجتماعی','created_at'=>now()],
           ['title'=>'سیاسی','created_at'=>now()],
           ['title'=>'هنری','created_at'=>now()],
           ['title'=>'ادبی','created_at'=>now()],
        ]);
    }
}
