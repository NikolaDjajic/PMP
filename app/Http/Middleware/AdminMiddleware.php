<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
     if (!session('logged_in')) {
            return redirect()->route('login');
        }

        $user = User::find(session('user_id'));

        if (!$user || $user->is_admin != 1) {
            abort(403, 'Nemaš pristup.');
        }

        return $next($request);
    }
}
