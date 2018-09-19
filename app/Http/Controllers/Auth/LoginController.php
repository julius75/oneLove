<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified){
            auth()->logout();
            flash('You need to confirm your account. We have sent you an activation code, please check your email.');
            return back();
    }
    elseif ($user->user_type==='admin'){
          return redirect('/admin');
        }
    return redirect()->intended($this->redirectPath());
    }
}
