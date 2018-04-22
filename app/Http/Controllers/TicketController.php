<?php

namespace app\Http\Controllers;

use app\Model\Ticket;
use app\Repositories\TicketRepository;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    protected $tickets;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->middleware('auth');
        $this->tickets = $ticketRepository;
    }

    public function index(Request $request)
    {
        return view('tickets.index', [
            'tickets' => $this->tickets->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $request->user()->ticket()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/tickets');
    }

    public function destroy(Request $request, Ticket $ticket)
    {
        $this->authorize('destroy', $ticket);

        $ticket->delete();

        return redirect('/tickets');
    }
}
