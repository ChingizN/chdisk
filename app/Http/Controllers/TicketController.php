<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function createTicket()
    {
        if (Auth::user()->permission == 'user') {
            return view('ticket');
        }
    }

    public function addTicket(Request $request)
    {
        $tickets = \App\Ticket::create([
            'author' => $request->author,
            'department_id' => $request->department_id,
            'theme' => $request->theme,
            'description' => $request->description
            ]);

        return redirect('/');
    }

    public function showTicket($id)
    {
        $ticket = \App\Ticket::find($id);
        $messages = \App\Message::where('ticket_id', $id)->get();
        return view('dialog', compact('ticket', 'messages'));
    }

    public function ticketStatus($id)
    {
        if (Auth::user()->permission == 'moderator') {
            
            $ticket = \App\Ticket::find($id);

            $ticket->status = 1;

            $ticket->save();

            return ['status' => $ticket->status];
        } else {
            return alert();
        }

    }
}
