<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChooseTenancy {

    public function handle(Request $request, Closure $next): Response
    {
//        $user = auth()->user();
//
//        if (!$user) {
//            return redirect()->route('login')->withErrors(['error' => 'Usuário não autenticado']);
//        }
//
//        if ($user->is_admin) {
//            return $next($request);
//        }
//
//        if (!$user->company_id) {
//            auth()->logout();
//            abort(403, 'Usuário não está associado a uma empresa válida.');
//        }

        return $next($request);
    }
}
