<?php

namespace app\Http\Controllers;

use app\Model\Categories;
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
            'categories' => Categories::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $request->user()->ticket()->create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect('/tickets');
    }

    public function destroy(Request $request, Ticket $ticket)
    {
        try{
            $this->authorize('destroy', $ticket);

            $ticket->delete();

        }catch (\Exception $e){
            return redirect('/tickets');
        }

        return redirect('/tickets');
    }

    public function edit(Request $request, Ticket $ticket)
    {   try{
        $this->authorize('destroy', $ticket);

        }catch (\Exception $e){
            return redirect('/tickets');
        }

        return view('tickets.edit', [
            'ticket' => $ticket,
            'categories' => Categories::all(),
        ]);
    }
    public  function update(Request $request, Ticket $ticket)
    {
        try{
            $this->authorize('destroy', $ticket);

            $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required',
                'category_id' => 'required',
            ]);

            $ticket->fill([
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id,
            ])->save();
        }catch (\Exception $e){
            return redirect('/tickets');
        }

        return redirect('/tickets');
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $ticket = $this->tickets->getSearch($request->user(), $query);

        return view('tickets.search', [
            'tickets' => $ticket,
            'query' => $query,
        ]);
    }
}
