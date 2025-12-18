<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get credentials from environment variables for security
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD', 'change-this-password');
        $adminName = env('ADMIN_NAME', 'Admin');

        // Check if admin user already exists
        $existingUser = User::where('email', $adminEmail)->first();

        if ($existingUser) {
            // Update existing user
            $existingUser->update([
                'name' => $adminName,
                'password' => Hash::make($adminPassword),
            ]);
            $this->command->info('Admin user updated successfully!');
        } else {
            // Create new admin user
            User::create([
                'name' => $adminName,
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword),
                'email_verified_at' => now(),
            ]);
            $this->command->info('Admin user created successfully!');
        }

        $this->command->info('Email: ' . $adminEmail);
        $this->command->warn('Make sure to change the default password after first login!');
    }
}
