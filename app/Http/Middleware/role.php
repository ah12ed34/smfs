<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(Auth::check()){
            if($role == 'student'&& Auth::user()->isStudent()){
                return $next($request);
            }elseif($role == 'academic'&& Auth::user()->isAcademic()){
                return $next($request);
            }elseif($role == 'admin'&& Auth::user()->isAdmin()){
                return $next($request);
            }elseif(Auth::user()->hasRole($role)){
                return $next($request);
            }else{
                return abort(403);
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
