<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\IzvjestajController;


Route::get('/', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('welcome'); 
})->name('pocetna');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();
    // dd($user); 
    if ($user && $user->password == $request->input('password')) {
        session(['logged_in' => true, 'user_id' => $user->id]);
        return redirect()->route('pocetna');
    }

    return back()->withErrors(['Neispravno korisničko ime ili lozinka.']);
});


Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

Route::get('/pocetna', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('welcome'); 
});

Route::get('/zaposleni', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('zaposleni'); 
})->name('zaposleni');

Route::get('/radni_nalozi', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('radni_nalozi'); 
})->name('radni_nalozi');

Route::get('/izvjestaji', [IzvjestajController::class, 'index'])->name('izvjestaji');

Route::get('/istorija_kvarova', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('istorija_kvarova'); 
})->name('istorija_kvarova');

Route::get('/prijavi_kvar_i_rjesenje', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('prijavi_kvar_i_rjesenje'); 
})->name('prijavi_kvar_i_rjesenje');

Route::get('/sastanci', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('sastanci'); 
})->name('sastanci');

Route::get('/odrzavanje_oprema', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('odrzavanje_oprema'); 
})->name('odrzavanje_oprema');

Route::get('/kontakt_odrzavanje', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('kontakt_odrzavanje'); 
})->name('kontakt_odrzavanje');
