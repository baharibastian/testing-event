<?php

namespace App\Http\Controllers;

use App\Event;
use App\Location;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twitter;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $event = Event::where('user_id',$user->id)->get();
    	return view('events.index')->with('events', $event);
    }

    public function create()
    {
        $locations = Location::where('user_id', Auth::id())->get();
    	return view('events.create')->with('locations', $locations);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'event_name' => ['required'],
            'event_desc' => ['required'],
            'event_start_date' => ['required'],
            'event_end_date' => ['required']
        ]);

    	$event = new Event;
    	$event->user_id = Auth::id();
    	$event->location_id = $request->location_id;
    	$event->event_name = $request->event_name;
    	$event->event_description = $request->event_desc;
    	$event->event_start_date = $request->event_start_date;
    	$event->event_end_date = $request->event_end_date;
    	$event->save();

    	return redirect('user/event');
    }

    public function edit($id)
    {
        $event = Event::join('locations','events.location_id','=','locations.location_id')
                ->select('events.*','locations.location_id')
                ->where('events.event_id', $id)
                ->first();
        $locations = Location::where('user_id',Auth::id())->get();
        return view('events.edit')
            ->with('event', $event)
            ->with('locations', $locations);
    }

    public function show($id)
    {
        $ticket = Ticket::where('event_id',$id)->get();
        $event = Event::join('locations','events.location_id', '=', 'locations.location_id')
                ->select('locations.location_name','events.*')
                ->where('events.event_id', $id)
                ->first();
        return view('events.detail')
            ->with('event', $event)
            ->with('ticket', $ticket);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_name' => ['required'],
            'event_desc' => ['required'],
            'event_start_date' => ['required'],
            'event_end_date' => ['required'],
            'location_id' => ['required']
        ]);
        
        $event = Event::find($id);
        $event->user_id = Auth::id();
        $event->location_id = $request->location_id;
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_desc;
        $event->event_start_date = $request->event_start_date;
        $event->event_end_date = $request->event_end_date;
        $event->save();

        return redirect('user/event');
    }

    public function tweet(Request $request)
    {
        $event = Event::find($request->id);
        $link = url('/').'/user/event/detail/'.$request->id;
        $message = 'Please see my '.$event->event_name.' here: '.$link;
        $send = Twitter::postTweet(['status' => $message, 'format' => 'json']);
        $response = json_decode($send);

        $flash_notif = 'Tweet Berhasi Dibuat, Link Tweet : https://twitter.com/statuses/'.$response->id;

        $request->session()->flash('status', $flash_notif);
        return redirect('/user');
    }
}
