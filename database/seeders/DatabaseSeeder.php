<?php

namespace Database\Seeders;

use App\Models\Bien;
use App\Models\specificite;
use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Directeur',
            'email' => 'directeur@mail.com',
            'password' => Hash::make('0000'),
        ]);

        Bien::factory()->count(50)->create();
        specificite::factory(7)->create();
    }
}
