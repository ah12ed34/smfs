<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers ;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected function redirectTo()
    // {
    //     if (Auth::user()->role == 'admin') {
    //         return '/admin';
    //     } else {
    //         return '/home';
    //     }
    // }
    protected $username ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        // $login = request()->input('username');
        // $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // request()->merge([$field => $login]);
        // $this->username = $field;
        // return $field;
        return $this->username = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    // public function redirectPath()
    // {
    //     if (Auth::check() && Auth::user()->isAdmin()) {
    //         return redirect()->route('admin');
    //     }
    
    //     return redirect()->route('home');
    // }

    
//     protected function authenticated(Request $request, $user)
// {
//     // إليك مكان إضافة البيانات الإضافية التي تريد
//     $user->lest_name = $request->lest_name;
//     $user->save();
    
//     return redirect()->intended($this->redirectPath());
// }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $errorMessage = trans('authen.failed');

    // if (!is_array($errorMessage)) {
    //     $errorMessage = [$errorMessage];
    // }

    // throw ValidationException::withMessages([
    //     $this->username() => $errorMessage,
    // ])->redirectTo(route('login'));    }


 
    // protected function username()
    // {
    //     return $this->username;
    // }
}