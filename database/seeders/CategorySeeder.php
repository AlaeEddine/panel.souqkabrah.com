<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\SubSubSubCategory;
use Eloquent; // ******** This Line *********
use DB;
use Illuminate\Support\Facades\File;
class CategorySeeder extends Seeder
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
        CategorySeeder::linkfiletopath("categories");
        CategorySeeder::linkfiletopath("subcategories");
        CategorySeeder::linkfiletopath("subsubcategories");
    }
}
