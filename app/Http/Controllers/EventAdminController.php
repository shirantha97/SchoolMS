<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use ConsoleTVs\Charts;
use ConsoleTVs\Charts\Charts;
//use Charts;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventAdminController extends Controller
{
    public function eventAdmin()
    {
        $events = Event::all();

        return view('adminPages.eventAdmin')->with('events' , $events);
    }

    public function societyAdmin()
    {
        return view('adminPages.societyAdmin');
    }

    public function sportAdmin()
    {
        return view('adminPages.sportsAdmin');
    }

    public function eventAdminHome()
    {
        return view('adminPages.eventAdminHome');
    }

    public function eventPDFHome()
    {
        $events = Event::all();

        return view ('event.eventPDFHome')->with('events' , $events);
    }
}
