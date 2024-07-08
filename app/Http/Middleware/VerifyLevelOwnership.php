<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifyLevelOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // احصل على معرف المستوى من مسار الطلب
        $levelId = $request->route('level');
        $levelId = is_object($levelId) ? $levelId->id : $levelId;
        // تحقق إذا كان المستخدم هو رئيس القسم في هذا المستوى
        if (!$user->academic->department->levels->contains('id', $levelId)
        ) {
            // dd($levelId);
            // if(optional($user)->role()->name == 'HeadOfDepartment')
                return redirect()->route('managerDepartment')->withErrors(['error' => 'Unauthorized access to level']);
            // else
            //     return redirect()->route('home')->withErrors(['error' => 'Unauthorized access to level']);
        }else{
        return $next($request);
        }
    }
}
