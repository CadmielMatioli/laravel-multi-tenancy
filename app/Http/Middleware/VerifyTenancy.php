<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyTenancy
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user->is_admin || $user->isMaster()) {
            return $next($request);
        }

        if ($user->companies->pluck('uuid')->contains(session('company_uuid'))) {
            return $next($request);
        }

        return redirect()->route('choose-tenancy.index');
    }
}
