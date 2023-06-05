<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();
        \App\Models\Pemohon::factory(10)->create();
        \App\Models\Berkas::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ridho',
            'email' => '1@1.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
