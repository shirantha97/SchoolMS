@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Supplier Details</strong>
            </h2>

        </div>
        <div class="container pull-right">
            <a href="/supplier/create" class="btn btn-outline-info text1" style="background-color: limegreen">Add
                Details</a>
        </div>
        <div class="container" style="margin-top:30px">
            @if(count($suppliers)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Supplier E-mail</th>
                        <th scope="col">Contact Details</th>
                        <th scope="col">Supply Item</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                        <tr class="text1"><strong>
                                <td> {{$supplier->supplierID}} </td>
                                <td> {{$supplier->name}} </td>
                                <td> {{$supplier->email}}</td>
                                <td> {{$supplier->contact_details}}</td>
                                @if($supplier->type == 'S')
                                    <td> Stationery</td>
                                @elseif($supplier->type == 'L')
                                    <td> Laboratary Equipments</td>
                                @elseif($supplier->type == 'SP')
                                    <td>Sports Items</td>
                                @elseif($supplier->type == 'R')
                                    <td>School Resources</td>
                                @endif
                                <td>
                                    <a href="/supplier/{{$supplier->supplierID}}/edit" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-form"
                                          action="{{action('Suppliercontroller@destroy' ,[$supplier->supplierID] )}}"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-default btn-danger text1">Delete</button>
                                    </form>

                                </td>
                            </strong>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 30px">
                    <a href="/inventory" class="btn btn-outline-info text1">IINVENTORY DASHBOARD</a>
                    <a href="/live_search" class="btn btn-outline-info text1">SEARCH</a>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center text-uppercase text-danger">
                            <h2 class="display-5" style="font-size:3vw;">
                                <strong>No details available</strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 15px">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="/inventory" class="btn btn-primary text1">INVENTORY DASHBOARD</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection