<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            "name" => "vivot1x",
            "price" => "12000",
            "category"=>"mobile",
            "image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLrd4JIt5V8FkgTeYUSaqUxzSIkz8I1DbwCg&usqp=CAU",
            "discription"=>"MediaTek MT6877 Dimensity 900 chipset, 5000 mAh battery, 256 GB storage"

        ]);
    }
}
