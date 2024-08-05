<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('language') && !$request->route('language')) {
            $defaultLanguage = session()->get('language');
            $routeName = $request->route()->getName();
            $routeParameters = $request->route()->parameters();
            $routeQuery = $request->query();
            $routeParameters['language'] = $defaultLanguage;

            if ($routeName) {
                try {
                    return redirect()->route($routeName, $routeParameters + $routeQuery);
                } catch (\InvalidArgumentException $e) {
                    Log::error("Route not defined: " . $routeName, $routeParameters);
                    abort(404);
                }
            } else {
                Log::error("Route name is not set.");
                abort(404);
            }
        }elseif($request->route('language')){
            session(['language' => $request->route('language')]);
            App::setLocale($request->route('language'));
        }else{
            session(['language' => 'ar']);
            App::setLocale('ar');
        }
        

        return $next($request);
    }
}
