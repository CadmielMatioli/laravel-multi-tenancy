<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stancl\Tenancy\Tenancy;
use Symfony\Component\HttpFoundation\Response;

class VerifyTenant
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = \auth()->user();
            $tenant = $user->tenant;
            if($tenant){
                Tenancy::initialize($tenant);
            }
        }else{
            return Redirect::route("login");
        }
        return $next($request);
    }
}
