<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $tickets = \App\Ticket::all();
            $messages = \App\Message::all();
            return view('main', ['tickets' => $tickets, 'messages' => $messages]);
        } else {
            return redirect('/login');
        }
    }
}



