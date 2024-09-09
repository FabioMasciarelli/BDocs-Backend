<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Sponsorship;
use App\Services\BraintreeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    // variable from BraintreeService
    protected $braintree;

    public function __construct(BraintreeService $braintree)
    {
        $this->braintree = $braintree;
    }

    // We save a client token and we redirect the client to the checkout
    public function showCheckout($id)
    {
        $sponsorship = Sponsorship::findOrFail($id);
        $clientToken = $this->braintree->generateClientToken();

        return view('admin.payments.checkout', [
            'clientToken' => $clientToken,
            'sponsorship' => $sponsorship
        ]);
    }

    public function processPayment(Request $request)
    {
        // Ottieni l'ID della sponsorizzazione dal modulo di richiesta
        $sponsorshipId = $request->input('id');

        // Ottieni il nonce del metodo di pagamento dal modulo di richiesta
        $nonce = $request->input('payment_method_nonce');

        // Trova la sponsorizzazione nel database o restituisci un errore se non trovata
        $sponsorship = Sponsorship::findOrFail($sponsorshipId);

        // Effettua la transazione con Braintree
        $result = $this->braintree->gateway()->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true]
        ]);

        if ($result->success) {
            // Ottieni l'utente autenticato
            $user = Auth::user();

            // Trova il dottore associato all'utente
            $doctor = Doctor::where('user_id', $user->id)->first();

            // Crea la sponsorizzazione dopo il pagamento
            $startDate = Carbon::now();
            $newEndDate = $startDate->copy()->addHours($sponsorship->duration);

            // Esegui tutte le operazioni nel contesto di una transazione
            DB::transaction(function () use ($doctor, $sponsorship, $startDate, $newEndDate) {
                // Trova la prima sponsorizzazione attiva del dottore
                $existingSponsorship = $doctor->sponsorships()
                    ->wherePivot('end_date', '>=', $startDate)
                    ->first();

                // Se esiste una sponsorizzazione attiva, aggiorna la data di fine
                if ($existingSponsorship) {
                    $updatedEndDate = Carbon::parse($existingSponsorship->pivot->end_date)->addHours($sponsorship->duration);

                    $doctor->sponsorships()->updateExistingPivot($existingSponsorship->id, [
                        'end_date' => $updatedEndDate,
                    ]);
                }

                // Aggiungi la nuova sponsorizzazione per il dottore
                $doctor->sponsorships()->attach($sponsorship->id, [
                    'start_date' => $startDate,
                    'end_date' => $newEndDate,
                ]);
            });

            // Reindirizza alla pagina dei dottori con un messaggio di successo
            return redirect()->route('admin.doctors.index')->with('message', 'La sponsorizzazione è avvenuta con successo');
        } else {
            // Se la transazione fallisce, reindirizza l'utente indietro con un messaggio di errore
            return redirect()->back()->with('error', 'Error: ' . $result->message);
        }
    }
}
