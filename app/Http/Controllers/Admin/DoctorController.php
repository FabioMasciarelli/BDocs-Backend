<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        //$userArray = User::all();
        //$doctorsArray = Doctor::all();
        // dd($userArray);
        // dd($doctorsArray);

        //media voti dottori
        if (!$doctor) {
            return redirect()->route('admin.doctors.create');
        }
        $averageRating = $doctor->ratings()->avg('rating');
        // Conta il numero totale dei voti
        $totalRatings = $doctor->ratings()->count();

        return view('admin.doctors.index', compact('user', 'doctor', 'averageRating', 'totalRatings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        $specializations = Specialization::all();
        return view('admin.doctors.create', compact('user', 'doctor', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctors = $request->validated();

        // SE LA RICHIESTA PRESENTA IL FILE CON LA CHIAVE PHOTO
        if ($request->hasFile('photo')) {

            // CREA IL PATH DELLA FOTO E LA METTE NELLO STORAGE
            $photo_path = Storage::put('photo', $request->photo);

            //ASSOCIA LA FOTO AL PATH CREATO
            $doctors['photo'] = $photo_path;
        }

        // SE LA RICHIESTA PRESENTA IL FILE CON LA CHIAVE CV
        if ($request->hasFile('CV')) {

            // CREA IL PATH DEL CV E LO METTE NELLO STORAGE
            $cv_path = Storage::put('cv', $request->CV);

            //ASSOCIA IL CV AL PATH CREATO
            $doctors['CV'] = $cv_path;
        }

        $newDoctor = new Doctor();

        //AL NUOVO DOTTORE PRENDO L'USER ID DELL' UTENTE AUTENTICATO
        $newDoctor->user_id = Auth::id();
        $newDoctor->fill($doctors);
        $newDoctor->save();

        //SE LA REQUEST HA SPECIALIZATION
        if ($request->has('specialization')) {

            //NELLA COLLECTION SPECIALIZATIONS ATTACCA LE SPECIALIZATION DELLA RICHIESTA
            $newDoctor->specializations()->attach($request->specialization);
        }

        // TEST
        // dd($request->validated());

        return redirect()->route('admin.doctors.index', ['doctor' => $newDoctor->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
         // Calcola la media dei voti
        $averageRating = $doctor->ratings()->avg('rating'); // 'rating' è il campo che contiene il valore del voto
        return view('admin.doctors.index', compact('doctor', 'averageRating' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        $specializations = Specialization::all();
        return view('admin.doctors.edit', compact('user', 'doctor', 'specializations'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, string $id)
{
    $doctors = $request->validated();

    // Recupera il dottore esistente tramite l'ID
    $doctor = Doctor::findOrFail($id);

    // Se la richiesta presenta il file con la chiave 'photo'
    if ($request->hasFile('photo')) {
        // Elimina la vecchia foto se esiste
        if ($doctor->photo) {
            Storage::delete($doctor->photo);
        }

        // Crea il path della nuova foto e aggiorna il path
        $photo_path = Storage::put('photo', $request->file('photo'));
        $doctors['photo'] = $photo_path;
    }

    // Se la richiesta presenta il file con la chiave 'CV'
    if ($request->hasFile('CV')) {
        // Elimina il vecchio CV se esiste
        if ($doctor->CV) {
            Storage::delete($doctor->CV);
        }

        // Crea il path del nuovo CV e aggiorna il path
        $cv_path = Storage::put('cv', $request->file('CV'));
        $doctors['CV'] = $cv_path;
    }

    // Aggiorna il dottore con i dati validati
    $doctor->update($doctors);

    // Aggiorna le specializzazioni se presenti
    if ($request->has('specialization')) {
        $doctor->specializations()->sync($request->input('specialization'));
    }

    // Reindirizza alla vista dell'indice dei dottori con un messaggio di successo
    return redirect()->route('admin.doctors.index')->with('message', 'Modifica avvenuta con successo');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor, User $user)
    {
        $user = User::findOrFail($doctor->user_id); // Trova l'utente associato al dottore

        if($doctor->photo) {
            Storage::delete($doctor->photo);
        }
 
        if($doctor->CV) {
            Storage::delete($doctor->CV);
        }

        $doctor->delete();
        $user->delete();
        return redirect()->route('welcome')->with('message', 'Il tuo profilo è stato eliminato correttamente.');

    }
}
