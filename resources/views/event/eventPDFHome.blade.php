@extends('layout')

@section('content')



    <div class="offset-4">
        <h1>Generate PDFs regarding Events</h1>

    </div>

    <div class="row col-md-12 container-fluid">

        <div class="col-md-3" style=" margin:2%;width:100%;background-color: lightcyan;border: 0.05px solid black">

            <div class="card-body">
                <div>
                    <h1>Information regarding all events</h1>
                </div>
                <div>
                    <button class="btn col-6"><a href="/pdfAllEvents"> Generate</a></button>
                </div>

            </div>
        </div>
        <div class=" col-md-3" style=" margin:2%;width: 100%;background-color: lightcyan;border: 0.05px solid black">
            <div class="card-body">
                <div>
                    <h1>PDFs on Monthly Expenses and Income of Events</h1></p>
                </div>
                <div >
                    <button class="btn col-6"><a href="/pdfMonthlyEvents"> Generate</a></button>
                </div>

            </div>
        </div>
        <div class=" col-md-3" style=" margin:2%;width: 100%;background-color: lightcyan;border: 0.05px solid black">
            <div class="card-body">
                <div>
                    <h1>PDFs Event Wise</h1></p>
                </div>
                <div>
                    <form method="GET" action="{{ action('EventPDFController@singleEvent')}}">
                        <input type="hidden" value="{{csrf_token()}}">
                        {{--<input class="form-control col-12"  name="event" type="Text" list="events" placeholder="Select Event"  required/>--}}
                        <select id="events" name="events" class="form-control col-8">
                            @if($events)
                                @foreach($events as $teach)
                                    <option value="{{$teach->id}}"> {{$teach->title}}</option>
                                @endforeach
                            @endif
                        </select>
                        <br>
                        <input type="submit" class="btn col-6" value="Generate">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection