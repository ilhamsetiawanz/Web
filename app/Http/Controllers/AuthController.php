<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\Petani;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginPage(){
        return view('pages.Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        // dd($request->all());
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        
    }
}
