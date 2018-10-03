@extends('layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Enter The Expenses </strong>
            </h2>
        </div>
        <div class="container" style="width: 50%">
            {!! Form::open(['action' => 'Inventoryexpenses@store','method' => 'POST', 'class'=> 'form-signin text-center']) !!}

            <div class="form-group form-row">
                {!! Form::Label('item', 'InvoiceID :-',['class'=>'text1']) !!}
                {{Form::number('invoiceID', '',['class'=>'form-control text1','placeholder'=>'Invoice ID','required'])}}
            </div>

            <div class="form-group form-row">
                @if(count($st)>0 || count($sp)>0 || count($res)>0 || count($lab)>0)
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
                @else
                    <button class="btn btn-primary btn-lg text1" disabled>Please enter the supplier details first
                    </button>
                @endif
            </div>

            <div class="form-group form-row">
                {!! Form::Label('item', 'Quantity :-',['class'=>'text1']) !!}
                {{Form::number('quantity','',['class'=>'form-control text1','placeholder'=>'Quantity','required'])}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('prices', 'Price :-',['class'=>'text1']) !!}
                {{Form::number('price','',['class'=>'form-control text1','placeholder'=>'Price','required'])}}
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
                        <button class="btn btn-primary btn-lg text1" disabled>Please enter the item details to the database
                        </button>
                    @endif
                </div>
            </div>
            @if(count($suppliers)>0 && (count($st)>0 || count($sp)>0 || count($res)>0 || count($lab)>0))
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            @endif
            <div class="text-center" style="margin-top: 30px">
                <a href="/inventory" class="btn btn-outline-info text1">INVENTORY DASHBOARD</a>
                <a href="/expenses" class="btn btn-outline-info text1">EXPENSES</a>
            </div>
        </div>

    </div>
@endsection