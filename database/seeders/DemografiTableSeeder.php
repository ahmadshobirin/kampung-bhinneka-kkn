<?php

namespace Database\Seeders;

use App\Models\Demografi;
use Illuminate\Database\Seeder;

class DemografiTableSeeder extends Seeder
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
                "neighborhood"   => "RT 01",
                "head_of_family" => 65,
                "inhabitant"     => 190,
                "toddler"        => 23,
                "elderly"        => 23,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 02",
                "head_of_family" => 200,
                "inhabitant"     => 128,
                "toddler"        => 24,
                "elderly"        => 28,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 03",
                "head_of_family" => 162,
                "inhabitant"     => 207,
                "toddler"        => 17,
                "elderly"        => 26,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 04",
                "head_of_family" => 0,
                "inhabitant"     => 0,
                "toddler"        => 17,
                "elderly"        => 0,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 05",
                "head_of_family" => 98,
                "inhabitant"     => 288,
                "toddler"        => 13,
                "elderly"        => 47,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 06",
                "head_of_family" => 74,
                "inhabitant"     => 241,
                "toddler"        => 8,
                "elderly"        => 28,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
            [
                "neighborhood"   => "RT 07",
                "head_of_family" => 120,
                "inhabitant"     => 550,
                "toddler"        => 25,
                "elderly"        => 16,
                "created_at"     => now(),
                "updated_at"     => now(),
            ],
        ];

        Demografi::insert($data);
    }
}
