@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Laboratory items details</strong>
            </h2>
        </div>
        <div class="container-box" style="width: auto;">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-2"></div>
                <div class="col-md-3 text-center text1">
                    <div class="card" style="width: 300px;height: 150px">
                        <div class="card-header" style="background-color: black;color: white;height: 70px">
                            Items with the lowest stock
                        </div>
                        <div class="card-body">
                            {{$st}}
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3 text-center text1">
                    <div class="card" style="width: 300px;height: 150px">
                        <div class="card-header" style="background-color: black;color: white;height: 70px">
                            Ordered Laboratory Items
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="/orders" style="width: auto;">
                                Number of Orders :- {{$orders}}
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container pull-right">
            <a href="/labs/create" class="btn btn-outline-info text1" style="background-color: limegreen">+Add items</a>
        </div>
        <div class="container" style="margin-top: 30px">
            @if(count($labs)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Amount in stock</th>
                        <th scope="col">Laboratory Type</th>
                        <th scope="col">Supplier ID</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($labs as $lab)
                        <tr class="text1"><strong>
                                <td> {{$lab->productID}} </td>
                                <td> {{$lab->name}} </td>
                                <td> {{$lab->amount}}</td>
                                <td> {{$lab->lab_type}}</td>
                                <td> {{$lab->supplierID}}</td>
                                <td>
                                    <a href="/labs/{{$lab->productID}}/edit" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-form"
                                          action="{{action('labscontreoller@destroy' ,[$lab->productID] )}}"
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