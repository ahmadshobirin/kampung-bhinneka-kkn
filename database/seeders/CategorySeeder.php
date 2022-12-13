<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "populer",
                "updated_at" => now(),
                "created_at" => now(),
            ],
            [
                "name" => "kesenian",
                "updated_at" => now(),
                "created_at" => now(),
            ],
            [
                "name" => "kolaborasi",
                "updated_at" => now(),
                "created_at" => now(),
            ],
        ];

        Category::insert($data);
    }
}
