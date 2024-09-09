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

        $this->call([UsersTableSeeder::class]);
        $this->call([DoctorsTableSeeder::class]);
        $this->call([SpecializationsTableSeeder::class]);
        $this->call([RatingsTableSeeder::class]);
        $this->call([SponsorshipsTableSeeders::class]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
