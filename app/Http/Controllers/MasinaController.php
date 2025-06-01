<?php

namespace App\Http\Controllers;

use App\Models\Masina;
use Illuminate\Http\Request;

class MasinaController extends Controller
{
    // Prikaz svih mašina
    public function index()
    {
        $masine = Masina::all();
        return view('masine.index', compact('masine'));
    }

    // Prikaz forme za dodavanje
    public function create()
    {
        return view('masine.create');
    }

    // Čuvanje nove mašine
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
        ]);

        Masina::create([
            'naziv' => $request->naziv,
        ]);

        return redirect()->route('masine.index')->with('success', 'Mašina je uspešno dodana.');
    }
}