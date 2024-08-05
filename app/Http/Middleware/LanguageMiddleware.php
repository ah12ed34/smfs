<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->segment(1));
        // $lang = $request->segment(1);

        // if (!in_array($lang, ['en', 'ar'])) {
        //     $lang = 'ar';
        // }

        // session(['language' => $lang]);
        if (session()->has('language')) {
            $lang = session()->get('language');
        } else {
            $lang = 'ar';
        }
        if (!in_array($lang, ['en', 'ar'])) {
            $lang = 'ar';
        }
        // dd($lang);
        app()->setLocale($lang);

        return $next($request);
    }
}
