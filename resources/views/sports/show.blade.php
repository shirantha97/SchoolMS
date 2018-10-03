@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/text_on_image.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('/css/tabs.css')}}">


    <div class="container-fluid">

        @if($sport)

            @if(Auth()->user())
                <?php
    //                To check whether the Student is already enrolled
                $thisUser = \Illuminate\Support\Facades\Auth::user()->id;
                $thisSport = \App\Sport::find($sport->id);
                $userExist = \Illuminate\Support\Facades\DB::table('sport_user')
                    ->where('user_id', $thisUser)
                    ->where('sport_id', $thisSport->id)
                    ->first();

    //           Tp check the student age
                $bday = \Illuminate\Support\Facades\Auth::user()->birthday;
                $now = \Carbon\Carbon::now();

                $birthday = \Carbon\Carbon::parse($bday);

                $StdAge = $birthday->diffInYears($now);

                $sportFromAge = $sport->from_grade + 5;
                $sportToAge =  $sport->to_grade + 5;

                ?>

            @endif

            <div class="row container-fluid">

                <div class="col-md-3 sports_sidebar" >
                    @if(Auth()->user())
                        @if(Auth()->user()->role_id == 3){{-- If the user is a student only they can enroll so role_id=3 --}}
                        @if($userExist) {{--If user is already Enrolled --}}
                            <div class="col-md-12" style="margin:2%">
                                <form id="add-user"
                                      action="{{action('SportController@removeStudent' , [$sport->id])}}" method="post">
                                    <div class="input-group">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" class="btn btn-primaryn" value="Un-Enroll Myself">
                                        <input value="{{$sport->id}}" type="hidden" name="sport_id">
                                        <input value="{{Auth()->user()->id}}" type="hidden" name="user_id">
                                    </div>
                                </form>
                            </div>
                        @else {{-- If Student not enrolled --}}
                            @if((Auth()->user()->gender == $sport->gender) || ($sport->gender == "Both")) {{-- Gender Check--}}
                                @if( $StdAge > $sportFromAge && $StdAge < $sportToAge){{--Checking the Age --}}
                                    <div class="row">
                                        <div class="col-md-12" style="margin:2%">
                                            <form id="add-user"
                                                  action="{{action('SportController@addStudent' , [$sport->id])}}"
                                                  method="post">
                                                <div class="input-group">
                                                    {{csrf_field()}}
                                                    <input type="submit" class="btn btn-primaryn" value="Enroll Myself">
                                                    <input value="{{$sport->id}}" type="hidden" name="sport_id">
                                                    <input value="{{Auth()->user()->id}}" type="hidden" name="user_id">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-warning">
                                        <h6 class="text-warning card-header">This sport is for students from age {{$sportFromAge}} to {{$sportToAge}}  </h6>
                                    </div>
                                @endif
                            @else {{--If student is of diff Gender--}}
                                <div class="alert-warning">
                                    <h6 class="text-danger card-header">This sport is only for {{$sport->gender}} Students</h6>
                                </div>
                            @endif
                        @endif
                        @endif
                        @if(Auth()->user()->id == $sport->user_id){{-- If the user is a teacher only they can check enrolled students --}}
                        <div class="row">
                            <div class="col-lg-12" style="margin:2%">
                                <form id="add-user"
                                      action="{{action('SportController@enrolledStudents')}}">
                                    <div class="input-group">
                                        {{csrf_field()}}
                                        <input type="submit" class="btn btn-success col-10"
                                               value="Students enrolled for {{$sport->title}}"
                                               name="user_id">
                                        <input value="{{$sport->id}}" type="hidden" name="sport_id">
                                        <input value="{{Auth()->user()->id}}" type="hidden" name="user_id">
                                    </div>
                                </form>

                            </div>
                        </div>
                        {{--@endif--}}
                        @endif

                        <div style="padding-top: 20px">
                            @if(auth()->user())
                                @if(auth()->user()->role_id == 1)
                                    {{--@include('sports.adminsidebar');--}}
                                @endif
                            @endif


                        </div>
                    @endif

                    <div style="margin: 2%">
                        @include('sports.sidebar');
                    </div>

                </div>

                <div class="col-md-9">
                    <div class="row col-md-12">
                        <div class="col-md-12" style="background-color: #6e8060; padding:2%; border-radius:10%">
                            <section class="col-md-10" id="tabs">
                                <div class="container">
                                    <div class="row" >
                                        <div class="col-md-12 ">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill col-md-12 " id="nav-tab" style="background-color: rgba(255,230,233,0.5)"
                                                     role="tablist">
                                                    <a class="nav-item nav-link active col-md-6" id="nav-home-tab"
                                                       data-toggle="tab" href="#nav-home" role="tab"
                                                       aria-controls="nav-home" aria-selected="True">School's
                                                        Information</a>
                                                    <a class="nav-item nav-link col-md-6" id="nav-profile-tab"
                                                       data-toggle="tab"
                                                       href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                       aria-selected="false">Learn More about {{$sport->title}} </a>
                                                </div>
                                            </nav>
                                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" >
                                                <div class="tab-pane fade show active " id="nav-home" role="tabpanel"
                                                     aria-labelledby="nav-home-tab" >
                                                    <table class="container" style="font-family:Gadugi" >
                                                        <tr>
                                                            <td class="col-md-8 pull-right">
                                                                <img src="/storage/img/{{$sport->image}}"
                                                                     style="width: 250px; height: 200px">
                                                            </td>
                                                            @if(Auth()->user())
                                                                @if(Auth()->user()->id == $sport->user_id)
                                                                    <td class="col-md-4">
                                                                        <button class="btn bg-info float-right"  type="Submit" style="margin: 2%"><a
                                                                                    class="text-white"
                                                                                    href="{{ action('SportController@edit',[$sport->id]) }}">Edit
                                                                                Sport</a>
                                                                        </button>
                                                                        <button class="btn btn-danger  float-right" type="Submit" style="margin: 2%">
                                                                            <a class="text-white" href="#"
                                                                               onclick="
                                                                                 var result = confirm('Are you sure youo want to delete this Event? ');

                                                                                 if(result){
                                                                                     event.preventDefault();
                                                                                     document.getElementById('delete-form').submit();
                                                                                 }">Delete Event</a>
                                                                            <form id="delete-form"
                                                                                  action="{{action('SportController@destroy' , [$sport->id])}}"
                                                                                  method="post" style="display:none">
                                                                                <input type="hidden" name="_method"
                                                                                       value="delete">
                                                                                {{csrf_field()}}
                                                                            </form>

                                                                        </button>
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>{{$sport->title}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Age from</th>
                                                            <td>{{$sport->from_grade}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Age to</th>
                                                            <td>{{$sport->to_grade}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Practices On</th>
                                                            <td>{{$sport->practice_on}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade col-md-12" id="nav-profile" role="tabpanel"
                                                     aria-labelledby="nav-profile-tab">
                                                    <img src="/storage/img/{{$sport->image}}"
                                                         style="width: 250px; height: 200px">
                                                    <div style="margin: 5%">
                                                        <h4 class="card-header" style="font-family: 'Hobo Std'; background-color:#a8a8a8">About {{$sport->title}}</h4>
                                                        <div class="card-body" style="font-family: 'Hobo Std'; background-color:lightgrey">
                                                            {{$sport->description}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>


                </div>


            </div>
        @endif
    </div>




@endsection