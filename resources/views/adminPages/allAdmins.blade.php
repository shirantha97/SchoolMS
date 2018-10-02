@extends('layout')

@section('content')

    <div class="col-12">

        <div>

            <table class="table-primary col-12" style="border: solid">
                <div>
                    <tr style="border: solid">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created On</th>
                        <th>Delete</th>
                    </tr>
                </div>
                @foreach($admins as $admin)

                    <div>
                        <tr style="border:groove;">
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->created_at}}</td>
                            <td>
                                <button class="btn btn-danger" type="submit">
                                    <a class="text-white" href="/Admindestroy"
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
                                          action="{{action('CustomLoginController@Admindestroy', [$admin->id])}}"
                                          method="post" style="display:none">
                                        <input type="hidden" name="_method" value="delete">
                                        {{csrf_field()}}
                                    </form>

                                </button>
                            </td>
                        </tr>

                    </div>
                @endforeach

            </table>

        </div>
    </div>

@endsection