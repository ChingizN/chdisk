<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return view('main');
        } else {
            return redirect('/login');
        }
    }
}



