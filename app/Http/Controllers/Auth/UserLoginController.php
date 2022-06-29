<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('phone_number', 'password'), $request->remember)) {
            return back()->with('login-failed', 'Invalid credentials');
        }

        if (isset(auth()->user()->landlord)) {
            return redirect()->route('landlord')->with('login-success', 'Successfully logged in');
        } elseif (isset(auth()->user()->tenant)) {
            return redirect()->route('tenant')->with('login-success', 'Successfully logged in');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
