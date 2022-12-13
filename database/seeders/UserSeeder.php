<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@kampungbhinneka.com',
            'password' => Hash::make('superadmin987'),
            'role' => 'superadmin'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Admin 3',
            'email' => 'admin3@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Admin 4',
            'email' => 'admin4@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Admin 5',
            'email' => 'admin5@kampungbhinneka.com',
            'password' => Hash::make('admin987'),
            'role' => 'admin'
        ]);
    }
}
