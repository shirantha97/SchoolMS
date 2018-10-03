@if($events)
    <div>
        <style>
            table td {
                border-top: 1px solid black;
                /*border-bottom: 1px solid black;*/
            }

            table td th tr{
                padding-right: 50%;
                padding: 15%;
            }


        </style>

        <div class="row" style="width: 100%;">
            {{--        <img src="{{asset('images/logo.jfif')}}">--}}
            <img src="{{ public_path('images/logo.jfif') }}" style="width: 100px"; height="100px" class="center">
            <h3 class="Uppercase">Wickramashila Central College , Giriulla</h3>

            <hr>

            <br>
            <br>
            <h4 >Details about all the events</h4>
        </div>


        <table style="border: solid; width: 100%">
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Venue
                </th>
                <th>
                    Grade
                </th>


                <th>
                    from_date
                </th>

                <th>
                    to_date
                </th>
            </tr>

            @foreach($events as $event)
                <tr>
                    <td>{{$event->title}}</td>


                    <td>{{$event->venue}}</td>
                    <td>From Grade {{$event->from_grade}} to {{$event->to_grade}} </td>
                    <td>{{$event->from_date}}</td>


                    <td>{{$event->to_date}}</td>
                </tr>
            @endforeach

        </table>
    </div>
@endif
