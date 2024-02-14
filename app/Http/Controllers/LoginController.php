<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('Pages.login');
        }
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->withInput($request->only('email'))
                ->withErrors(['error' => 'Email atau password salah']);
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    
}
