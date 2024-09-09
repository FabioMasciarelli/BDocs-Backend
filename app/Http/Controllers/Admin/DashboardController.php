<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Rating;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();

        // Verifica se il dottore esiste
        if (!$doctor) {
            return redirect()->route('admin.doctors.create');
        }
        
        // Recupera la sponsorizzazione attiva con la data di fine più lontana
        $activeSponsorship = $doctor->sponsorships()
        ->wherePivot('end_date', '>=', now())
        ->wherePivot('start_date', '<=', now()) // Assicurati di includere anche la data di inizio
        ->orderBy('end_date', 'desc')
        ->first();
        
        // Altri dati per la vista
        $reviews = Review::where('doctor_id', $user->id)->orderByDesc('created_at')->first();
        $messages = Message::where('doctor_id', $user->id)->orderByDesc('created_at')->first();

        // Raccolta dati tabella di messaggi, voti e recensioni
        $monthlyData = []; // array delle statistiche per mese

        for ($i = 0; $i < 12; $i++) {
            $date = Carbon::now()->subMonths($i); // toglie $i (cioè i mesi dell'anno) alla data attuale in modo da avere gli ultimi 12 mesi 
            $month = $date->format('m-Y'); // prendiamo mese e anno delle date che ci tornano da $date
    
            $reviewsCount = Review::where('doctor_id', $doctor->id) 
                ->whereYear('created_at', $date->year) // dove l'anno corrisponde a quella di $date
                ->whereMonth('created_at', $date->month) // dove il mese corrisponde a quello di $date
                ->count();
    
            $messagesCount = Message::where('doctor_id', $doctor->id)
                ->whereYear('created_at', $date->year) // dove l'anno corrisponde a quella di $date
                ->whereMonth('created_at', $date->month) // dove il mese corrisponde a quello di $date
                ->count();
    
            $ratingsCount = $doctor
                ->ratings()
                ->where('doctor_id', $doctor->id)
                ->whereYear('created_at', $date->year) // dove l'anno corrisponde a quella di $date
                ->whereMonth('created_at', $date->month) // dove il mese corrisponde a quello di $date
                ->count();
            
            // nella variabile iniziale andiamo a inserire i dati raccolti nel ciclo
            $monthlyData[] = [
                'month' => $month,
                'reviews' => $reviewsCount,
                'messages' => $messagesCount,
                'ratings' => $ratingsCount,
            ];
        }

        // ruotiamo l'array per avere i mesi in ordine corretto
        $monthlyData = array_reverse($monthlyData);


        // Recupera le statistiche
        $ratingByStars = $doctor->ratings()->select(DB::raw('rating_id, COUNT(*) as count'))->groupBy('rating_id')->orderBy('rating_id', 'asc')->pluck('count', 'rating_id');

        // Divisione dati 
        $ratingLabels = $ratingByStars->keys()->toArray(); // array con rating_id
        $ratingCounts = $ratingByStars->values()->toArray(); // array con i conteggi

        return view('admin.dashboard', [
            'user' => $user,
            'reviews' => $reviews,
            'messages' => $messages,
            'monthlyData' => $monthlyData,
            'activeSponsorship' => $activeSponsorship,
            'ratingLabels' => $ratingLabels,
            'ratingCounts' => $ratingCounts,
        ]);
    }
}
