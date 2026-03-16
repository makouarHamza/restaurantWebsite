<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view("home", compact('foods'));
    }
    public function goTO()
    {
        return view("admin.adminfile");
    }
    public function home()
    {
        if (Auth::id() && Auth::user()->role === "admin") {
            return view("admin.dashboard");
        } else if (Auth::id() && Auth::user()->role === 'user') {
            return view('dashboard');
        }
    }
}
