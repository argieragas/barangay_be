<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'position' => 'Admin',
            'committee' => 'Admin',
            'address' => 'Purok. Malinawon 2, Brgy. Matiao, Mati City',
            'password' => Hash::make('johndoe')
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'superAdmin',
            'email' => 'superadmin@gmail.com',
            'position' => 'SuperAdmin',
            'committee' => 'SuperAdmin',
            'address' => 'Purok. Malinawon 2, Brgy. Matiao, Mati City',
            'password' => Hash::make('superadmin')
        ]);
    }
}
