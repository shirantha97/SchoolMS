@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/text_on_image.css')}}">
    <link rel="stylesheet" href="{{asset('/css/card.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">
    <script src="{{asset('/js/card.js')}}"></script>


    <div class="container-fluid">
        <div class="row container-fluid">

            <div class="col-md-3 rounded sports_sidebar" >

                <div style="padding-top: 20px">
                    @include('sports.sidebar');
                </div>

            </div>

            <div class="col-md-9">

                <h1 class="text-center text-uppercase card-header" style="color: #2600ad; font-family:Verdana">Sports at WCC</h1>

                <div class="row ">

                    @foreach($sports as $sport)

                        <div class="col-md-6">
                            <div class="container">

                                <div class="active-with-click">
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <div class="material-card Red">
                                            <h2>
                                                <span>{{$sport->title}}</span>
                                                <strong>
                                                <i class="fa fa-fw fa-star"></i>
                                                {{--The Deer Hunter--}}
                                                    Eligible for students from Grade {{$sport->from_grade}} to {{$sport->to_grade}}
                                                </strong>
                                            </h2>
                                            <div class="mc-content">
                                                <div class="img-container">
                                                    <img class="img-responsive" src="/storage/img/{{$sport->image}}"
                                                         style="height: inherit">
                                                </div>
                                                <div class="mc-description">
                                                    <h5 class="text-warning">From Grade {{$sport->from_grade}} To {{$sport->to_grade}}</h5>
                                                    <div style="width: inherit">
                                                        <hr>
                                                        <h6>Read More for more Information </h6>
                                                    </div>
                                               </div>
                                                <div class="mc-footer col-md-12">
                                                    {{--<div class="btn btn-success"><a style="color: white; height:50px; width: 70px" href="{{ action('SportController@show',[$sport->id]) }}">Read More </a></div>--}}
                                                    <div class="btn"><a style="background-color:green ;color: #690012; height:10px" href="{{ action('SportController@show',[$sport->id]) }}">Read More</a></div>
                                                </div>
                                            </div>
                                            <a class="mc-btn-action">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>

            </div>


        </div>
    </div>


@endsection