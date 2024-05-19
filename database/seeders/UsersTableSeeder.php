<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create two dummy users
        // User::create([
        //     'username' => 'tpb2171',
        //     'password' => 'admintpb',
        //     'admin' => true,
        // ]);

        // User::create([
        //     'username' => 'walidata2171',
        //     'password' => 'kominfo2171',
        //     'admin' => false,
        // ]);

        User::create([
            'username' => 'tpbadminepss2024',
            'password' => 'tpbadminpassword',
            'admin' => true,
        ]);

        User::create([
            'username' => 'epss2024monita',
            'password' => 'walidata2171',
            'admin' => false,
        ]);



        // User::create([
        //     'username' => 'user1',
        //     'password' => 'password1',
        //     'admin' => false,
        // ]);

        // User::create([
        //     'username' => 'admin',
        //     'password' => 'adminpassword',
        //     'admin' => true,
        // ]);

        // User::create([
        //     'username' => 'newuser',
        //     'password' => 'tesuser', // This will be automatically hashed
        //     'admin' => false,
        // ]);
    }
}
