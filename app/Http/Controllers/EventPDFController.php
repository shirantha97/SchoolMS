<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


class EventPDFController extends Controller
{
    public function index()
    {
        $events = Event::all();

        $pdf = \PDF::loadView('event.pdfAllEvents',compact('events'));
        return $pdf->download('pdfAllEvents.pdf');
    }

    public function monthlyEvents()
    {
        $monthlyEvents = Event::selectRaw('year(from_date) year, monthname(from_date) month , sum(act_expense) exp, sum(act_income) inc')

            ->groupBy('year', 'month')
            ->orderByRaw('min(from_date)')
            ->get();


        $pdf = \PDF::loadView('event.pdfMonthlyEvents',compact('monthlyEvents'));
        return $pdf->download('pdfMonthlyEvents.pdf');
    }

    public function singleEvent(Request $request)
    {
        $eid = Input::get('events');

//        dd($event);
        if($eid)
        {
            $singleEvent = Event::find($eid);

            $pdf = \PDF::loadView('event.singleEvent',compact('singleEvent'));
            return $pdf->download('singleEvent.pdf');
        }else{
            return redirect()->back()->with('error', "There are no events realted to the Title provided");
        }

    }
}
