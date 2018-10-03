@extends('layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px;height: auto">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Enter The Stationery items Details</strong>
            </h2>
        </div>
        <div class="container" style="width: 50%">
            {!! Form::open(['action' => ['Stationarycontroller@update',$stationary->productID],'method' => 'POST', 'class'=> 'form-signin']) !!}
            {{Form::hidden('_method','PUT')}}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::Label('name', 'Item Name :-',['class'=>'text1']) !!}
                {{Form::text('name', $stationary->name,['class'=>'form-control text1','id'=>'name','placeholder'=>'Item Name','required'])}}
            </div>
            <div class="form-group">
                {!! Form::Label('id', 'Product ID :-',['class'=>'text1']) !!}
                {{Form::number('productID',$stationary->productID,['class'=>'form-control text1','id'=>'id','placeholder'=>'Product ID (100< >200)','required'])}}
            </div>
            <div class="form-group">
                {!! Form::Label('qty', 'Quantity :-',['class'=>'text1']) !!}
                {{Form::number('quantity',$stationary->amount,['class'=>'form-control text1','id'=>'qty','placeholder'=>'Amount in stock','required'])}}
            </div>
            <div class="form-group">
                <div>
                    {!! Form::Label('supplier', 'Supplier :-',['class'=>'text1']) !!}
                    <select class="form-control text1" id="supplier" style="color: black" name="supplier">
                        @foreach($st as $s)
                            <option>{{$s->supplierID}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            <div style="margin-top: 30px" class="text-center">
                <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                <a href="/stationary" class="btn btn-outline-info text1">STATIONERY ITEMS</a>

            </div>

        </div>

    </div>
@endsection