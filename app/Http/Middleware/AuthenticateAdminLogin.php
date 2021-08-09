<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() === false){
            return redirect()->route('admin.login.index');
        }
        if(Auth::user()->role <=config('common.role.member')){
            return redirect()->route('admin.login.index');
        }
        return $next($request);
    }
}
