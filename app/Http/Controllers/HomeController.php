<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $events = Event::where('user_id', $auth->id)->get();
        return view('index')->with('events', $events);
    }
}
