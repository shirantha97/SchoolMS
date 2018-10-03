@if($monthlyEvents)
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

    </div>
    <div>
        <h2>Income and Expenses Monthly</h2>
        <table style="border: solid; width: 100%">
            <tr >
                <th>
                    Year
                </th>
                <th >
                    Month
                </th>
                <th >
                    Expenses
                </th>
                <th>
                    Incomes
                </th>
            </tr>

            @foreach($monthlyEvents as $event)
                <tr>
                    <td>{{$event->year}}</td>
                    <td >{{$event->month}}</td>
                    <td >Rs. {{$event->exp}}</td>
                    <td >Rs. {{$event->inc}}</td>

                </tr>

            @endforeach

        </table>
    </div>
@endif