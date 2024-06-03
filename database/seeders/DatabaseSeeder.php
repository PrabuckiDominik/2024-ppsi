<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Material;
use App\Models\Position;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
            'role' => 'admin'
        ]);

        Position::factory()->create([
            'section' => 'Biuro',
            'name' => 'Kadry',
            'grade' => '3'
        ]);

         Material::factory()->create([
             'name' => 'Aluminium'
         ]);
    }
}
