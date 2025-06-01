<?php

namespace App\Http\Controllers;

use App\Models\Izvjestaj;
use Illuminate\Http\Request;

class IzvjestajController extends Controller
{
    // Prikaz svih izvještaja
    public function index()
    {

        if (!session('logged_in')) {
        return redirect()->route('login');
        }
        $izvjestaji = Izvjestaj::all();
        return view('izvjestaji', compact('izvjestaji'));
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'opis' => 'required|string',
        'fajl' => 'nullable|file|max:10240',
        // ako budeš imao masina_id: 'required|exists:masine,id'
    ]);

    $fajlPutanja = $request->hasFile('fajl') 
        ? $request->file('fajl')->store('izvjestaji_fajlovi', 'public')
        : null;

    \App\Models\Izvjestaj::create([
        'opis' => $validated['opis'],
        'fajl' => $fajlPutanja,
        // 'masina_id' => $validated['masina_id'], // kasnije
    ]);

    return redirect()->back()->with('success', 'Objava uspešno sačuvana.');
}




    public function masina()
    {
        return $this->belongsTo(Masina::class);
    }

    // Ovde možeš dodati i ostale metode za CRUD (create, store, edit, update, delete)
}
