@extends('layout')

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-9">

                <div class="row container">

                @if($event)

                    <!-- Post Content Column -->
                        <div class="col-lg-12" style="background-color: #a6b2a4; margin: 0px; border-radius: 2%">

                            <div class="container">
                                <!-- Title -->
                                <h1 class="mt-4">{{$event->title}}</h1>

                                <!-- Author -->
                                <p class="lead">
                                    {{--by--}}
                                    {{--<a href="#" style="color: #060606;">The Literary Society </a>--}}
                                </p>

                                <hr>

                                <!-- Date/Time -->
                                <div>
                                    <h4 class="btn-block disabled" style="color: #9cffd2">Posted
                                        on {{$event->created_at}} </h4>
                                </div>
                                <hr>

                                <!-- Preview Image -->

                                <img src="/storage/img/{{$event->image}}" style="width: 250px; height: 200px">

                                @if(optional(auth()->user())->id == $event->user_id )
                                    <div class="btn-group-lg " style="margin: 10px">
                                        <label class="info-back">Update Image</label>
                                        <form enctype="multipart/form-data" method="post"
                                              action="/Event/showEvent/{{$event->id}}">
                                            {{csrf_field()}}
                                            <input type="file" name="image" class="btn btn-outline-dark">

                                            <input type="submit" name="image" class="btn btn-default pull-right">
                                        </form>
                                    </div>
                                @endif

                                <hr>
                                <div>
                                    <table>
                                        <tr>
                                            <td>Venue:</td>
                                            <td>{{$event->venue}}</td>
                                        </tr>
                                        <tr>
                                            <td>From</td>
                                            <td>{{$event->from_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>To</td>
                                            <td>{{$event->to_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>From(Grade)&nbsp;</td>
                                            <td>{{$event->from_grade}}</td>
                                        </tr>
                                        <tr>
                                            <td>To(Grade)&nbsp;</td>
                                            <td>{{$event->to_grade}}</td>
                                        </tr>
                                    </table>

                                    <hr>

                                </div>

                                <div class="container">
                                    <p>{{$event->detailed_description}}</p>
                                    {{--nl2br()--}}
                                </div>

                                <hr>

                            </div>

                            <div class="container-fluid"
                                 style="background-color: #35813b; padding: 15px;border-radius: 10px"
                            ">
                        @if(Auth()->user())
                            <!-- Comments Form -->
                                <div class="card my-4" style="background: #4db949;border-radius: 10px">

                                    <div class="card-body">
                                        <form method="post" action='/Event/{{$event->id}}/comment'>
                                            <h5 class="card-header">Leave a Comment:</h5>

                                            <label type="hidden">{{csrf_field()}}</label>

                                            <div class="form-group">
                                                <textarea class="form-control" name="body" rows="3"></textarea>
                                            </div>
                                            <button type="Submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                        @endif

                        <!-- Single Comment -->
                            <div>
                                @foreach($event->comments as $comments)
                                    <div class="media mb-4 col-md-10 cmt">

                                        <div class="media-body">

                                            <h5 class="mt-0 card-header">{{$comments->user->name}}
                                                <small> said</small>
                                            </h5>

                                            <p class="card-body">{{$comments->body}}</p>

                                            {{--<div class="float-right ">--}}
                                            {{--<form method="post" action="{{action('CommentsController@destroy' , [$event->id , $comments->id ])}}">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--<input type="hidden" name="_method" value="delete">--}}
                                            {{--<button type="Submit" class="btn btn-primary">Delete</button>--}}
                                            {{--</form>--}}
                                            {{--</div>--}}

                                        </div>
                                    </div>

                                    <hr>
                                @endforeach
                            </div>

                        </div>


                        <?php
                        //                        $soc = \App\User::where('email', $socid->email)->get();
                        //
                        //                        $socid = \App\Society::where('id', $event->society_id)->first();
                        //                        $user = \App\User::where('email', $socid->email)->first();
                        ?>

                        @if(auth()->user())
                            @if(auth()->user()->id == $event->user_id )
                                <div class="btn-group-lg" style="margin: 1%;">
                                    <button class="btn bg-info " style="width: 45%; border-radius: 50%;" type="submit">
                                        <a
                                                class="text-white"
                                                href="{{ action('EventController@edit',[$event->id]) }}">Edit Event</a>
                                    </button>
                                    <button class="btn btn-danger" style="width: 45%; border-radius: 50%" type="submit">
                                        <a class="text-white" href="#"
                                           onclick="
                                                         var result = confirm('Are you sure youo want to delete this Event? ');

                                                         if(result){
                                                             event.preventDefault();
                                                             document.getElementById('delete-form').submit();
                                                         }

                                                        "
                                        >
                                            Delete Event</a>

                                        <form id="delete-form"
                                              action="{{action('EventController@destroy' , [$event->id])}}"
                                              method="post" style="display:none">
                                            <input type="hidden" name="_method" value="delete">
                                            {{csrf_field()}}
                                        </form>

                                    </button>
                                </div>
                            @endif
                        @endif

                        <hr>

                    @endif
                </div>

            </div>

        </div>

        <div class="col-md-3 sports_sidebar">

            @include('include.sidebar')
        </div>

    </div>

    </div>

@endsection
