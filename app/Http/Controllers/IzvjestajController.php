<?php

namespace App\Http\Controllers;

use App\Models\Izvjestaj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzvjestajController extends Controller
{
    // Prikaz svih izvještaja
   public function index(Request $request)
{
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    // Učitavanje svih mašina za dropdown
    $masine = \App\Models\Masina::all();

    // Priprema upita za filtraciju
    $query = \App\Models\Izvjestaj::with('masina');

    // Ako korisnik izabere mašinu, filtriraj izvještaje
    if ($request->filled('masina_id')) {
        $query->where('masina_id', $request->masina_id);
    }

    // Izvještaji se sortiraju tako da se novi prikazuju prvi
    $izvjestaji = $query->orderBy('created_at', 'desc')->get();

    return view('izvjestaji', compact('izvjestaji', 'masine'));
}



    public function store(Request $request)
{
   
    $validated = $request->validate([
        'opis' => 'required|string',
        'fajl' => 'nullable|file',
        'masina_id' => 'required|exists:masinas,id',
    ]);
    
    $fajlPutanja = $request->hasFile('fajl') 
        ? $request->file('fajl')->store('izvjestaji_fajlovi', 'public')
        : null;

    
    $izvjestaj = \App\Models\Izvjestaj::create([
        'opis' => $validated['opis'],
        'fajl' => $fajlPutanja,
        'user_id' => session('user_id'),
        'masina_id' => $validated['masina_id'],
    ]);
    return redirect()->back()->with('success', 'Objava uspešno sačuvana.');
}

    public function masina()
    {
        return $this->belongsTo(Masina::class);
    }

    // Ovde možeš dodati i ostale metode za CRUD (create, store, edit, update, delete)
}
