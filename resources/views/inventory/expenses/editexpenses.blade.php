@extends('layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        <div class="text-center">
            <h2 class="display-5 text-center ">
                <strong>Enter The Expenses</strong>
            </h2>
        </div>
        <div class="container" style="width: 50%;">
            {!! Form::open(['action' => ['Inventoryexpenses@update',$expenses->invoiceID],'method' => 'POST', 'class'=> 'form-signin text-center']) !!}
            <input name="_method" type="hidden" value="PATCH">

            <div class="form-group form-row">
                {!! Form::Label('item', 'InvoiceID :-',['class'=>'text1']) !!}
                {{Form::number('invoiceID', $expenses->invoiceID,['class'=>'form-control text1','placeholder'=>'Invoice ID','required'])}}
            </div>

            <div class="form-group form-row">
                <div>
                    {!! Form::Label('item', 'Product ID :-',['class'=>'text1']) !!}
                    <select class="form-control text1" style="color: black" name="productID">
                        @foreach($st as $s)
                            <option>{{$s}}</option>
                        @endforeach
                        @foreach($sp as $s)
                            <option>{{$s}}</option>
                        @endforeach
                        @foreach($res as $s)
                            <option>{{$s}}</option>
                        @endforeach
                        @foreach($lab as $s)
                            <option>{{$s}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group form-row">
                {!! Form::Label('item', 'Quantity :-',['class'=>'text1']) !!}
                {{Form::number('quantity',$expenses->quantity,['class'=>'form-control text1','placeholder'=>'Quantity','required'])}}
            </div>
            {!! Form::Label('prices', 'Price :-',['class'=>'text1']) !!}
            {{Form::number('price',$expenses->price,['class'=>'form-control text1','placeholder'=>'Price','required'])}}
            <div class="form-group form-row">
                <div>
                    {!! Form::Label('item', 'Supplier:',['class'=>'text1']) !!}
                    <select class="form-control text1" style="color: black;" name="supplier">
                        @foreach($suppliers as $supplier)
                            <option>{{$supplier->supplierID}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            <div class="text-center" style="margin-top: 30px">
                <a href="/inventory" class="btn btn-outline-info text1">Admin Dashboard</a>
                <a href="/expenses" class="btn btn-outline-info text1">Expenses</a>
            </div>
        </div>

    </div>
@endsection