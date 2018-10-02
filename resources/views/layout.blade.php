<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Management</title>

    <link rel="stylesheet" href="{{asset('/css/cust.css')}}">

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/popper.min.js')}}"></script>

    {{--FontAwesome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    {{--Madhatter Full Callendar--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>








    <style>
        body {
{{--            background-image: url("{{asset('images/bg1.jpg')}}");--}}
                 background-color: #e8ffe6;

        }

        nav ul li a:hover {
            color: #0ea30e;

        }

        .inner {
            width: 50%;
            margin: 0 auto;
        }

        .lo {
            background-color: #343a40;
        }

        item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #343a40;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .text1 {
            font-size: medium;
            font-family: "Comic Sans MS";
            color: black;
        }

        .card1 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            background-color: #9d9d9d;
            width: auto;
            height: 380px;
            margin-left: auto;
            margin-right: auto;
        }

        .card1:hover {
            /*box-shadow: 0 32px 16px 0 rgba(0,0,0,0.2);*/
            box-shadow: 10px 10px black;
        }

        .image {
            height: 200px;
            display: block;
            margin-left: auto;
            margin-right: auto;

            width: 50%;
            border-radius: 4px;
            padding: 5px;
        }

        .imageholder {
            padding-top: 25px;
        }

        .cardheader {
            padding-top: 15px;
            text-shadow: whitesmoke;
            font-size: x-large;
        }

        .stockcard {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            background-color: darkgreen;
            width: 250px;
            height: 250px;
            margin-left: auto;
            margin-right: auto;
        }

        .stockcard:hover {
            /*box-shadow: 0 32px 16px 0 rgba(0,0,0,0.2);*/
            box-shadow: 5px 5px black;
        }

    </style>

</head>
<body >

<div>
    <div>
        @include('include.navbar')
    </div>
    <div class="container" style="padding: 1%">
        @include('include.error')
        @include('include.success')
    </div>
    <div style="margin: 15px">
        @yield('content')
    </div>
    <div style="margin-top: 30px">
        @include('include.footer')
    </div>

</div>

</body>
</html>