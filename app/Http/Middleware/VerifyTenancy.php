<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyTenancy
{

    public function handle(Request $request, Closure $next): Response
    {
//        $user = auth()->user();
//
//        if ($user->is_admin) {
//            return $next($request);
//        }
//
//        if(session('company_id') == $user->company_id) {
//            return $next($request);
//        }

        return redirect()->route('choose-tenancy');
    }
}
