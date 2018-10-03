@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/evenAdminHome.css')}}">

    <div class="container">
        <div>
            <div class="grid">
                <div class="card card__one">
                    <figure class="card__img">
                        <img src="{{('images/charts.jpg')}}" width="100%" height="220" style="margin-top: 10%"/>
                    </figure>
                    <div class="card__desc">
                        <h4 class="text-center">Graphical Representation of Event Information</h4>
                    </div>
                </div>

                <div class="card card__one">
                    <figure class="card__img">
                        <img src="{{('images/pdf.png')}}" width="100%"  style="margin-top: 10%; height: 280px"/>
                    </figure>
                    <div class="card__desc">
                        <h4 class="text-center">PDF Generation</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection