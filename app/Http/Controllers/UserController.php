<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Prikaz svih korisnika (samo za admina)
    public function index()
    {
        $users = User::all();
        return view('admin/korisnici', compact('users'));
    }

    // Forma za dodavanje novog korisnika (opciono)
    public function create()
    {
        return view('admin.users.create');
    }

    // Čuvanje novog korisnika
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:3',
            'is_admin' => 'boolean',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? $request->is_admin : false,
        ]);

        return redirect()->route('korisnici')->with('success', 'Korisnik uspješno dodat.');
    }

    // Brisanje korisnika
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // (Opcionalno) Ne dozvoli adminu da obriše samog sebe
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Ne možeš obrisati svoj nalog.');
        }

        $user->delete();

        return redirect()->route('korisnici')->with('success', 'Korisnik uspješno obrisan.');
    }
}
