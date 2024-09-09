<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorshipController extends Controller
{
    public function index()
    {
        // Recupera tutte le sponsorizzazioni disponibili
        $sponsorships = Sponsorship::all();

        // Passa le sponsorizzazioni alla vista
        return view('admin.sponsorships.index', compact('sponsorships'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ottieni l'utente autenticato
        $user = Auth::user();
        // Trova il dottore associato all'utente
        $doctor = Doctor::where('user_id', $user->id)->first();

        // Verifica se l'utente è un dottore autorizzato
        if (!$doctor instanceof Doctor) {
            return redirect()->route('admin.sponsorships.index')->with('error', 'Utente non autorizzato');
        }

        // Ottieni l'ID della sponsorizzazione dal modulo di richiesta
        $sponsorshipId = $request->input('sponsorship_id');
        // Trova la sponsorizzazione nel database o fallisci se non trovata
        $sponsorship = Sponsorship::findOrFail($sponsorshipId);

        // Reindirizza alla pagina di checkout
        return redirect()->route('admin.checkout', ['id' => $sponsorship->id]);

        //Logica spostata nel controller del pagamento in quanto facciamo un redirect a quello.

        // // Imposta la data di inizio alla data e ora corrente
        // $startDate = Carbon::now();
        // // Calcola la nuova data di fine in base alla durata della sponsorizzazione
        // $newEndDate = $startDate->copy()->addHours($sponsorship->duration);

        // // Esegui tutte le operazioni nel contesto di una transazione
        // DB::transaction(function () use ($doctor, $sponsorship, $startDate, $newEndDate) {
        //     // Trova la prima sponsorizzazione attiva del dottore
        //     $existingSponsorship = $doctor->sponsorships()
        //         ->wherePivot('end_date', '>=', $startDate)
        //         ->first();

        //     // Se esiste una sponsorizzazione attiva, aggiorna la data di fine
        //     if ($existingSponsorship) {
        //         $updatedEndDate = Carbon::parse($existingSponsorship->pivot->end_date)->addHours($sponsorship->duration);

        //         $doctor->sponsorships()->updateExistingPivot($existingSponsorship->id, [
        //             'end_date' => $updatedEndDate,
        //         ]);
        //     }

        //     // Aggiungi la nuova sponsorizzazione per il dottore
        //     $doctor->sponsorships()->attach($sponsorship->id, [
        //         'start_date' => $startDate,
        //         'end_date' => $newEndDate,
        //     ]);
        // });

        // // Reindirizza alla pagina delle sponsorizzazioni con un messaggio di successo
        // return redirect()->route('admin.checkout', ['id' => $sponsorship->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
