<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){

            return back()->with('status', 'Invalid Credentials');
        }

        return redirect()->route('dashboard');
    
    }
}
