<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <style>
        html, body {
            background-color: white;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
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
            height: 335px;
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

        .card1 {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            background-color: darkgreen;
            width: auto;
            height: 335px;
            margin-left: auto;
            margin-right: auto;
        }

        .card1:hover {
            /*box-shadow: 0 32px 16px 0 rgba(0,0,0,0.2);*/
            box-shadow: 10px 10px black;
        }
        .image{
            height: 200px;
            display: block;
            margin-left: auto;
            margin-right: auto;

            width: 50%;
            border-radius: 4px;
            padding: 5px;
        }

        .imageholder{
            padding-top: 25px;
        }

        .cardheader{
            padding-top: 15px;
            text-shadow: whitesmoke;
            font-size: x-large;
        }


    </style>
</head>
<body style="width: auto;height: auto">
<div>
    @include('inventory.navbar.navbar')
</div>
<div class="row justify-content-md-center">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="container-box text-center" style="margin-top: 15px;width: 100%;">
            @include('inventory.messages.message')
        </div>
    </div>
    <div class="col-3"></div>
</div>
@yield('content')
<footer style="margin-top: 170px;z-index: 10;height: 3em;">
    @include('inventory.footer.footer')
</footer>
</body>