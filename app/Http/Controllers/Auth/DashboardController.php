<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function index(){
        return view('dashboard');
    }
}
