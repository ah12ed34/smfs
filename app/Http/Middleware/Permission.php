<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Permission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$name): Response
    {
        if (Auth::check()){
            if(Auth::user()->hasPermission($name)) {
            // if(User::find(Auth::user()->id)->hasPermission($name)) {
                return $next($request);
            } else {
                abort(403);
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
