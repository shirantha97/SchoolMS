@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center ">
                <strong>Monthly Expenses details</strong>
            </h2>
        </div>
        <div class="container pull-right">
            <a href="/inventoryexpenses/create" class="btn btn-outline-info text1" style="background-color: limegreen">+Add
                Details</a>
        </div>
        <div class="container" style="margin-top: 30px">
            @if(count($expenses)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Invoice ID</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Added Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $e)
                        <tr class="text1"><strong>
                                <td> {{$e->invoiceID}} </td>
                                <td> {{$e->productID}} </td>
                                <td> {{$e->supplierID}}</td>
                                <td> {{$e->quantity}}</td>
                                <td> {{$e->price}}</td>
                                <td> {{$e->created_at}}</td>
                                <td> {{$e->updated_at}}</td>
                                <td>
                                    <a href="/expenses/{{$e->invoiceID}}/edit" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-form"
                                          action="{{action('Inventoryexpenses@destroy' ,[$e->invoiceID] )}}"
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
                <div style="margin-top: 50px">
                    <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center text-uppercase text-danger">
                            <h2 class="display-5" style="font-size:3vw;">
                                <strong>No data available</strong>
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