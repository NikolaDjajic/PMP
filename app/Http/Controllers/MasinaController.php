<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Masina;

class MasinaController extends Controller
{
   public function downloadMehanicka($id)
{
    $filePath = "dokumentacija/masina_{$id}_mehanicka.pdf";

    if (Storage::disk('public')->exists($filePath)) {
        return Storage::disk('public')->download($filePath);
    }

    abort(404, 'Fajl nije pronađen');
}

public function downloadElektricna($id)
{
    $filePath = "dokumentacija/masina_{$id}_elektricna.pdf";

    if (Storage::disk('public')->exists($filePath)) {
        return Storage::disk('public')->download($filePath);
    }

    abort(404, 'Fajl nije pronađen');
}
public function index()
    {
        $masinas = Masina::all();
        return view('admin/masine', compact('masinas'));
    }

public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
        ]);

        Masina::create([
            'naziv' => $request->naziv,
        ]);

        return redirect()->route('masine')->with('success', 'Masina uspješno dodana.');
    }

 
    public function delete($id)
    {
        $masina = Masina::findOrFail($id);

        $masina->delete();

        return redirect()->route('masine')->with('success', 'Masina uspješno obrisana.');
    }

}