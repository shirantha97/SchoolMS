<style>
    table td{
        border-bottom:1px solid black;
        padding-top: 25px;
        padding-bottom: 25px;
    }
</style>

<div style="width: 100%">

    <div class="row" style="width: 100%; display: block;">
        {{--        <img src="{{asset('images/logo.jfif')}}">--}}
        <img src="{{ public_path('images/logo.jfif') }}" style="width: 100px; margin-left: 40%" height="100px"; class="center">
        <h3 class="Uppercase" style="margin-left: 25%">Wickramashila Central College , Giriulla</h3>

    </div>

    <hr>
    @if($singleEvent)
        <h4 >Details about {{$singleEvent->title}}</h4>
        <table style="border: solid">
            <tr>
                <th>Title</th>
                <td>{{$singleEvent->title}}</td>
            </tr>
            <tr>
                <th>Venue</th>
                <td>{{$singleEvent->venue}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$singleEvent->detailed_description}}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>{{$singleEvent->from_grade}}  to {{$singleEvent->to_grade}} </td>
            </tr>
            <tr>
                <th>From</th>
                <td>{{$singleEvent->from_date}}</td>
            </tr>
            <tr>
                <th>To</th>
                <td>{{$singleEvent->to_date}}</td>
            </tr>

        </table>
    @endif

</div>