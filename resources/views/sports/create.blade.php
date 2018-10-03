@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/text_on_image.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sports_sidebar.css')}}">

    <div class="container-fluid">
        <div class="row container-fluid">

            <div class="col-md-3 sports_sidebar" >
                <div style="padding-top: 20px">
                    @include('sports.sidebar');
                </div>
            </div>

            <div class="col-md-9">
                <h1 class="text-light text-center card-header">Create Sport</h1>

                <form name="createSport" action="{{ action('SportController@store') }}" method="post" onsubmit="return sportValidation()" enctype="multipart/form-data">
                    <label type="hidden">{{csrf_field()}}</label>

                    <div class="form-group">
                        <label for="exampleInputPassword1"><h6>Sport Name</h6></label>
                        <input type="Text" name="title" class="form-control" value="{{old('title')}}"
                               id="exampleInputPassword1" placeholder="Enter Title" >
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="teacherInCharge"><h6>Teacher In Charge (ID)</h6> </label>--}}
                        {{--<input type="Text" name="teacherInCharge" class="form-control" id="exampleInputPassword1"--}}
                               {{--placeholder="Enter Title" value="{{old('teacherInCharge')}}" required>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="venue"><h6>Teacher In Charge</h6></label>
                        <input class="form-control col-6" name="teacherInCharge" type="Text" value="{{old('teacherInCharge')}}" list="teachers" placeholder="Select Teacher in Charge"  required/>
                        <datalist id="teachers">
<<<<<<< HEAD
=======
                            {{--<option value="School Main Hall">School Main Hall</option>--}}
                            {{--<option value="School Grounds">School Grounds</option>--}}
                            {{--<option value="Auditorium">Auditorium</option>--}}
>>>>>>> 2850006995c7d8a29a95ca683106bb7d7dd90ec4
                            @if($teachers)
                                @foreach($teachers as $teach)
                                    <option value="{{$teach->id}}"> Teacher Name is {{$teach->name}}</option>
                                @endforeach
                            @endif
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="detailedDescription"><h6>Description</h6></label>
                        <textarea rows="10" type="Text" class="form-control" value="{{old('detailed_Description')}}"
                                  name="detailed_Description" aria-describedby="emailHelp"
                                  placeholder="A proper explanation about the Sport" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="venue"><h6>Practice Location</h6></label>
                        {{--<input type="Text" class="form-control" name="venue" value="{{old('venue')}}"--}}
                               {{--id="exampleInputPassword1" placeholder="Enter Practicing Location" required>--}}
                        <input class="form-control" name="venue" type="Text" list="locations" placeholder="Select or Type Your Location"  required/>
                        <datalist id="locations">
                            <option value="School Main Hall">School Main Hall</option>
                            <option value="School Grounds">School Grounds</option>
                            <option value="Auditorium">Auditorium</option>
                        </datalist>
                    </div>

                    <div class="form-group col-md-7" style="padding-bottom:3%;padding-top:3%">
                        <div class="col-md-6 float-left">
                            <label for="fromGrade"><h6>From (Grade)</h6></label>
                            <input type="Number" class="form-control" name="from_grade" value="{{old('from_grade')}}"
                                   aria-describedby="emailHelp"
                                   placeholder="Lowest Grade that is permitted to participate" required>
                        </div>
                        <div class="col-md-6 float-left">
                            <label for="toGrade"><h6>To (Grade)</h6></label>
                            <input type="Number" class="form-control" name="to_grade" value="{{old('to_grade')}}"
                                   aria-describedby="emailHelp"
                                   placeholder="Highest Grade that is permitted to participate" required>
                        </div>
                    </div>
                    <div class="form-group col-md-7" style="padding-top:5%">
                        <div class="col-md-12">
                            <label for="teacherInCharge"><h6>Gender :&nbsp </h6> </label>
                            <input style="margin: 1%" type="radio" name="gender"  id="male" value="Male" required>Male
                            <input style="margin: 1%" type="radio" name="gender"  id="male" value="Female" required>Female
                            <input style="margin: 1%" type="radio" name="gender"  id="male" value="Both" required>Both
                        </div>
                    </div>

                    <div class="form-group col-md-12 ">
                        <div class="col-md-12">
                            <label><h6>Practices On :&nbsp</h6></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Monday" value="Monday" >
                                <label class="form-check-label" >Monday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Tuesday" value="Tuesday"  >
                                <label class="form-check-label" >Tuesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Wednesday" value="Wednesday" >
                                <label class="form-check-label" >Wednesday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Thursday" value="Thursday" >
                                <label class="form-check-label" >Thursday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Friday" value="Friday" >
                                <label class="form-check-label" >Friday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Saturday" value="Saturday" >
                                <label class="form-check-label" >Saturday</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="practicesOn[]" id="Sunday" value="Sunday" >
                                <label class="form-check-label" >Sunday</label> &nbsp;&nbsp;
                            </div>
                            <button class="btn" type="reset" style="border-radius: 50%">Uncheck All Days</button>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 float-left"  style="padding-bottom:3%;padding-top:1%">
                        <input type="file" name="image" value="{{old('image')}}" class="btn btn-outline-dark">
                        <p class="text-warning">*Encouraged to enter a gif (Live Image)</p>
                    </div>
                    {{--<div class="badge-warning card-header " style="margin: 15px">*Image can be changed after submitting the form</div>--}}
                    <div class="btn-block" style="padding-bottom:3%;padding-top:3%">
                        <button type="Submit" class="btn btn-primary btn-block" style="padding: 1%"><h3></h3>Submit
                        </button>
                        <br>
                    </div>

                </form>
            </div>



        </div>
    </div>


@endsection
