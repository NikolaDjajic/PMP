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

    // Ovde možeš dodati i ostale metode za CRUD (create, store, edit, update, delete)
}
