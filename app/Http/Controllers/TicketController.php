<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::join('events','event_tickets.event_id','=','events.event_id')
                ->select('event_tickets.*','events.*')
                ->where('events.user_id', Auth::id())
                ->get();
        return view('tickets.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $events = Event::where('user_id', $user->id)->get();
        return view('tickets.create')->with('events', $events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ticket_name' => ['required'],
            'ticket_price' => ['required']
        ]);

        $ticket = new Ticket;
        $ticket->event_id = $request->event_id;
        $ticket->ticket_name = $request->ticket_name;
        $ticket->ticket_price = $request->ticket_price;
        $ticket->save();

        return redirect('user/ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::join('events','event_tickets.event_id','=','events.event_id')
                ->select('event_tickets.*','events.*')
                ->where('ticket_id',$id)
                ->first();
        $events = Event::where('user_id', Auth::id())->get();
        return view('tickets.edit')
            ->with('ticket', $ticket)
            ->with('events', $events);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ticket_name' => ['required'],
            'ticket_price' => ['required'],
            'event_id'      => ['required']
        ]);

        $ticket = Ticket::find($id);
        $ticket->ticket_name = $request->ticket_name;
        $ticket->ticket_price = $request->ticket_price;
        $ticket->event_id = $request->event_id;
        $ticket->save();

        return redirect('user/ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
