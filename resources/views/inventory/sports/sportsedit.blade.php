@extends('layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Enter The Sports Items Details</strong>
            </h2>
        </div>
        <div class="container" style="width: 50%">
            {!! Form::open(['action' => ['Sportsocks@update',$sport->productID],'method' => 'POST', 'class'=> 'form-signin text-center']) !!}
            <input name="_method" type="hidden" value="PATCH">
            {{csrf_field()}}
            <div class="form-group">
                {{Form::text('name', $sport->name,['class'=>'form-control text1','placeholder'=>'Items Name','required'])}}
            </div>
            <div class="form-group">
                {{Form::number('productID',$sport->productID,['class'=>'form-control text1','placeholder'=>'Product ID (500< >600)','required'])}}
            </div>
            <div class="form-group">
                {{Form::number('amount',$sport->amount,['class'=>'form-control text1','placeholder'=>'Amount in stock','required'])}}
            </div>
            <div class="form-group form-row">
                <div>
                    @if(count($suppliers)>0)
                        {!! Form::Label('item', 'Supplier :-',['class'=>'text1']) !!}
                        <select class="form-control text1" style="color: black" name="supplier" required>
                            @foreach($suppliers as $supplier)
                                <option>{{$supplier->supplierID}}</option>
                            @endforeach
                        </select>
                    @else
                        <button class="btn btn-primary btn-lg text1" disabled>Please enter the supplier details first
                        </button>
                    @endif
                </div>
            </div>
            @if(count($suppliers)>0)
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            @endif
            <div style="margin-top: 30px" class="text-center">
                <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                <a href="/inventorysports" class="btn btn-outline-info text1">SPORTS ITEMS</a>
            </div>
        </div>

    </div>
@endsection