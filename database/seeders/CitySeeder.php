<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
        public static function linkfiletopath($filename){
            Eloquent::unguard();
            $filePath = base_path()."/database/sql/$filename.sql";
            if(File::exists($filePath)){
                DB::unprepared(file_get_contents($filePath));
            }
        }
        public static function run(): void
        {
            CategorySeeder::linkfiletopath("cities");
        }
}
