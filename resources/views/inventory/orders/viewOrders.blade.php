@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        @if(count($orders)>0)
            <div class="text-center">
                <h2 class="display-5 text-center" style="font-size:4vw;">
                    <strong>Orders </strong>
                </h2>
            </div>
        @else
            <div class="text-center">
                <h2 class="display-5 text-center" style="font-size:4vw;">
                    <strong> No Orders </strong>
                </h2>
            </div>
        @endif
        <div class="container pull-right">
            <a href="/orders/create" class="btn btn-outline-info text1"
               style="background-color: limegreen">Add Orders</a>
        </div>

        <div class="container" style="margin-top: 30px">
            @if(count($orders)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Type</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Added Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="text1"><strong>
                                <td> {{$order->id}} </td>
                                <td> {{$order->empid}} </td>
                                <td> {{$order->items}}</td>
                                <td> {{$order->type}}</td>
                                <td> {{$order->quantity}}</td>
                                <td> {{$order->created_at}}</td>
                                <td>
                                    <form id="delete-form" action="{{action('Ordercontroller@destroy' ,[$order->id] )}}"
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
                <div>
                    <a href="/inventory" class="btn btn-outline-info text1">Admin Dashboard</a>
                </div>
            @else
                <div class="col-md-6">
                    <div class="img-responsive">
                        <img src="{{asset('images/inventory_order.gif')}}">
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection