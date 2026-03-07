<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view("home");
    }
    public function home(){
        if(Auth::id() && Auth::user()->role === "admin"){
            return view("admin.dashboard");

        }
        else if(Auth::id() && Auth::user()->role === 'user'){
            return view('dashboard');

        }
    }
}
