<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctorsQuery = Doctor::with(['user', 'specializations', 'ratings', 'reviews', 'sponsorships']);

        if ($request->specialization_id) {
            $doctorsQuery->whereHas('specializations', function ($query) use ($request) {
                $query->where('specialization_id', $request->specialization_id);
            });
        }

        // Recupera tutti i dottori e calcola la media dei voti
        $doctors = $doctorsQuery->get()->map(function ($doctor) {
            $averageRating = $doctor->ratings->avg('rating');
            // Arrotonda al numero intero più vicino
            $doctor->average_rating = $averageRating ? round($averageRating) : 0;

            // Filtra le sponsorizzazioni attive
            $activeSponsorships = $doctor->sponsorships()
                ->where('end_date', '>=', now())
                ->get();
            $doctor->active_sponsorships = $activeSponsorships;

            return $doctor;
        });

        // Filtra i dottori in base alla media dei voti
        if ($request->has('average_rating')) {
            $averageRating = $request->input('average_rating');
            $doctors = $doctors->filter(function ($doctor) use ($averageRating) {
                return $doctor->average_rating == $averageRating;
            });
        }

        if ($request->review_id) {
            $doctorsQuery->whereHas('reviews', function ($query) use ($request) {
                $query->where('review_id', $request->review_id);
            });
        }

        $data = [
            "results" => $doctors->values()
        ];

        return response()->json($data);
    }

    public function show(string $doctor_id)
    {
        $doctor = Doctor::with(['user', 'specializations', 'ratings', 'reviews', 'sponsorships'])->find($doctor_id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        // Calcola la media dei voti del dottore
        $averageRating = $doctor->ratings->avg('rating');
        // Arrotondamento al numero intero più vicino
        $doctor->average_rating = $averageRating ? round($averageRating) : 0;

        // Filtra le sponsorizzazioni attive
        $activeSponsorships = $doctor->sponsorships()
            ->where('end_date', '>=', now())
            ->get();
        $doctor->active_sponsorships = $activeSponsorships;

        $data = [
            'results' => $doctor,
        ];

        return response()->json($data);
    }
}