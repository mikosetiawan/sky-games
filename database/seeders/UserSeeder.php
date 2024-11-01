<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'level' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create staff user
        DB::table('users')->insert([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'level' => 'staff',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create sample customer users
        $customers = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
            ],
        ];

        foreach ($customers as $customer) {
            DB::table('users')->insert([
                'name' => $customer['name'],
                'email' => $customer['email'],
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'level' => 'customer', // default level as specified in migration
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}