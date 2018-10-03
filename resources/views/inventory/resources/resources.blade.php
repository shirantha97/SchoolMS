@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>School Resources Details</strong>
            </h2>
        </div>
        <div class="container">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-3"></div>
                <div class="col-md-3 text-center text1">
                    <div class="card">
                        <div class="card-header" style="background-color: black;color: white;height: 60px">
                            Items with the lowest stock
                        </div>
                        <div class="card-body">
                            {{$st}}
                        </div>

                    </div>
                </div>
                <div class="col-md-3 text-center text1">
                    <div class="card">
                        <div class="card-header" style="background-color: black;color: white">
                            Ordered Resource Items
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="/orders">
                                Number of Orders :- {{$orders}}
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container pull-right">
            <a href="/resource/create" class="btn btn-outline-info text1" style="background-color: limegreen">+Add
                Details</a>
        </div>
        <div class="container" style="margin-top: 30px">
            @if(count($resources)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Resource Item ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Supplier ID</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $r)
                        <tr class="text1"><strong>
                                <td> {{$r->productID}} </td>
                                <td> {{$r->name}} </td>
                                <td> {{$r->amount}}</td>
                                <td> {{$r->supplierID}}</td>
                                <td>
                                    <a href="/resource/{{$r->productID}}/edit" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-form"
                                          action="{{action('Resourcecontroller@destroy' ,[$r->productID] )}}"
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
                    <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="text-center text-uppercase text-danger">
                            <h2 class="display-5" style="font-size:3vw;">
                                <strong>No Items available</strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 15px">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection