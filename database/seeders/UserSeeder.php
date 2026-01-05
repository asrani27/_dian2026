<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create lab manager user
        User::create([
            'name' => 'Lab Manager',
            'username' => 'manager',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        // Create regular users (students/staff)
        User::create([
            'name' => 'Student User',
            'username' => 'student',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Staff User',
            'username' => 'staff',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $this->command->info('Sample users created successfully!');
        $this->command->info('Admin: admin / password');
        $this->command->info('Manager: manager / password');
        $this->command->info('Student: student / password');
        $this->command->info('Staff: staff / password');
    }
}
