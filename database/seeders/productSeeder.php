<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('products')->insert([
        [
            "id" => 1,
            "name" => "Cardiac Valve Ring",
            "image" => "https://5.imimg.com/data5/SELLER/Default/2022/12/CO/QD/IR/3887778/disposable-surgical-products-for-hospital-industry.jpg",
            "size" => "22mm",
            "description" => "Used in heart valve repair surgeries to support valve function.",
            "price" => 120.00,
            "category" => "Cardiac Surgery",
            "manufacturer" => "MedTech Instruments",
            "brand" => "CardioFix",
            "created_at" => now(),
            "updated_at" => now()
        ],
        [
            "id" => 2,
            "name" => "Coronary Artery Bypass Set",
            "image" => "https://5.imimg.com/data5/SELLER/Default/2022/12/CO/QD/IR/3887778/disposable-surgical-products-for-hospital-industry.jpg",
            "size" => "Standard",
            "description" => "Instrument set used during coronary artery bypass graft surgery (CABG).",
            "price" => 450.00,
            "category" => "Cardiac Surgery",
            "manufacturer" => "SurgiPro Medical",
            "brand" => "BypassPro",
            "created_at" => now(),
            "updated_at" => now()
        ],
        // Continue with items 3 to 8...
    ]);
}
}
