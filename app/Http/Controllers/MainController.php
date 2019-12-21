<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class MainController extends Controller
{
    public function paginate($items, $perPage = 2, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->permission == 'moderator') {
                $tickets = \App\Ticket::all();
                $tickets = $tickets->sortByDesc('updated_at')->where('status', 0);
                $tickets = $this->paginate($tickets, $perPage = 2, $page = null, $options = []);
            } else {
                $tickets = \App\Ticket::all();
                $tickets = $tickets->sortByDesc('updated_at')->where('status', 0)->where('author', Auth::user()->name);
                $tickets = $this->paginate($tickets, $perPage = 2, $page = null, $options = []);
            }
            $messages = \App\Message::all();
            $messages = $messages->sortByDesc('updated_at')->unique('ticket_id');
            return view('main', ['tickets' => $tickets, 'messages' => $messages]);
        } else {
            return redirect('/login');
        }
    }

    public function ticketFilter(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->permission == 'moderator') {
                $tickets = \App\Ticket::all();

                if ($request->has('status')) {
                    $tickets = $tickets->sortByDesc('updated_at');
                } else {
                    $tickets = $tickets->sortByDesc('updated_at')->where('status', 0);
                }

                if ($request->has('department_id')) {
                    $tickets = $tickets->sortByDesc('updated_at')->where('department_id', $request->department_id);
                }


                $tickets = $this->paginate($tickets, $perPage = 2, $page = null, $options = [])->appends(request()->query());
            } else {
                $tickets = \App\Ticket::all();
                if ($request->has('status')) {
                    $tickets = $tickets->sortByDesc('updated_at')->where('author', Auth::user()->name);
                } else {
                    $tickets = $tickets->sortByDesc('updated_at')->where('status', 0)->where('author', Auth::user()->name);
                }
                $tickets = $this->paginate($tickets, $perPage = 2, $page = null, $options = []);
            }
            $messages = \App\Message::all();
            $messages = $messages->sortByDesc('updated_at')->unique('ticket_id');
            return view('main', ['tickets' => $tickets, 'messages' => $messages]);
        } else {
            return redirect('/login');
        }
    }
}