<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $messages = \App\Message::create([
            'ticket_id' => $request->ticket_id,
            'author' => $request->author,
            'message' => $request->message
        ]);
        $id = $request->ticket_id;
        $ticket = \App\Ticket::find($id);
        $ticket->updated_at = date_create();
        $ticket->save();
        return redirect("/ticket/$request->ticket_id");
    }
}
