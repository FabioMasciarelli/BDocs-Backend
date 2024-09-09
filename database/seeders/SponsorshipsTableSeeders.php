<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            ['name' => 'Silver', 'price' => 2.99, 'duration' => 24],
            ['name' => 'Gold', 'price' => 5.99, 'duration' => 72],
            ['name' => 'Diamond', 'price' => 9.99, 'duration' => 144],
        ];

        foreach ($sponsorships as $sponsorshipData) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorshipData['name'];
            $newSponsorship->price = $sponsorshipData['price'];
            $newSponsorship->duration = $sponsorshipData['duration'];
            $newSponsorship->save();
        }

    }
}
