<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'Surename',
            'email' => 'test@example.com',
        ]);

        $this->call(JobSeeder::class);
    }
}
