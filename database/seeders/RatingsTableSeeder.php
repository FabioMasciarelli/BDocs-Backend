<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = [1, 2, 3, 4, 5];

        foreach ($ratings as $rating) {
            $newRating= new Rating();
            $newRating->rating = $rating;
            $newRating->save();
        }
    }
}
