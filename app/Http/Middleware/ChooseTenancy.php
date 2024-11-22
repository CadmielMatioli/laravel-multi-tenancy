<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ChooseTenancy {

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if($user->is_admin){
            Gate::before(function($user) {
                return $user->is_admin;
            });
           return $next($request);
        }

        if($user->isMaster()){
           return $next($request);
        }

        if($user->companies()->count() == 1){
            $company = $user->companies()->first();
            session()->put('company_uuid', $company->uuid);
        }

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Usuário não autenticado']);
        }

        if (!$user->companies()->exists()) {
            auth()->logout();
            session()->invalidate();
            abort(403, 'Usuário não está associado a uma empresa válida.');
        }

        return $next($request);
    }
}
