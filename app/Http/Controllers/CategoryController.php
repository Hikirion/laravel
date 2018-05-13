<?php

namespace app\Http\Controllers;

use app\Model\Categories;
use app\Repositories\TicketRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected  $tickets;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->middleware('auth');
        $this->tickets = $ticketRepository;
    }

    public function index(Request $request, $id)
    {
        $ticket = $this->tickets->forCategoriesUser($request->user(), $id);
        $category = Categories::find($id);

        return view('category.index', [
            'tickets' => $ticket,
            'category' => $category,
        ]);
    }
}
