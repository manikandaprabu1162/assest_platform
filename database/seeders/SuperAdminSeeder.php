<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Superadmin role if not exists
        // $role = Role::firstOrCreate(['name' => 'superadmin']);

        // Check if Superadmin user already exists
        $user = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Superadmin',
                'password' => Hash::make('superpassword123'), // change to strong password
            ]
        );

        // // Assign Superadmin role
        // if (!$user->hasRole('superadmin')) {
        //     $user->assignRole($role);
        // }

        $this->command->info('Superadmin user created: superadmin@example.com / superpassword123');
    }
}