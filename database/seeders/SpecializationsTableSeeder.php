<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = config('specializations');

        foreach($specializations as $specialization) {

            $newSpecialization = new Specialization();
            $newSpecialization->title = $specialization;
            $newSpecialization->save();
        }
    }
}
