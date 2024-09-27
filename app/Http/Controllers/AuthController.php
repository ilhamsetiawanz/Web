<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\Petani;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    
            // Dapatkan peran pengguna yang sedang login
            $userRole = Auth::user()->role; // Asumsi ada kolom 'role' di tabel users
    
            // Redirect berdasarkan peran pengguna
            if ($userRole === 'admin') {
                return redirect()->intended('/Admin');
            } elseif ($userRole === 'user') {
                return redirect()->intended('/');
            }
    
            // Default redirect jika tidak ada peran yang sesuai
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerPage() {
        return view('pages.Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role to 'user'
        ]);

        Auth::login($user);

        return redirect()->route('Home')->with('success', 'Registration successful!');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('Home')->with('success', 'You have been logged out.');
    }
    
}
