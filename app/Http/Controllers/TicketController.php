<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show()
    {
        return view('ticket');
    }

    public function addTicket(Request $request)
    {
        $tickets = \App\Ticket::create([
            'author' => $request->author,
            'department' => $request->department,
            'theme' => $request->theme,
            'description' => $request->description
            ]);

        return redirect('/');
    }
}
