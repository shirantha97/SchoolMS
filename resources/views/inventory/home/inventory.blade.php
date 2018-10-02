@extends('layout')
@section('content')

<div class="container" style="margin-top: 50px;">
   <div class="row">
      <div class="card-deck">
         {{--orders--}}
         <div class="col-md-4">
            <div class="card1">
               <div class="card-header" style="background-color: black;height: 90px">
                  <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Request your needs here</strong></h3>
               </div>
               <div class="card-body text-center">
                  <h4 style="color: white"><strong>Order the items you request from the Inventory</strong></h4><br>
                  <a  class="btn btn-primary btn-lg"  aria-pressed="true" href="orders/create">Enter</a>
                  <h4 style="color: white;font-family: sans-serif">Pending Orders :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['pending']}}</button></h4>
               </div>

            </div>
         </div>

         {{--stationary items--}}
         <div class="col-md-4" >
            <div class="card1">
               <div class="card-header" style="background-color: black;height: 90px">
                  <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Stationery Items</strong></h3>
               </div>
               <div class="card-body text-center">
                  <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                  <a class="btn btn-primary btn-lg" aria-pressed="true" href="/stationary">Enter</a>
                  <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['items']}}</button></h4>
               </div>

            </div>
         </div>

         <div class="col-md-4">
            <div class="card1">
               <div class="card-header" style="background-color: black;height: 90px">
                  <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Laboratary Equipments</strong></h3>
               </div>
               <div class="card-body text-center">
                  <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                  <a class="btn btn-primary btn-lg" aria-pressed="true" href="/labs">Enter</a>
                  <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['labs']}}</button></h4>
               </div>
            </div>

         </div>
      </div>
      <div class="row" style="margin-top: 20px;">
         <div class="card-deck">
            <div class="col-md-4">
               <div class="card1">
                  <div class="card-header" style="background-color: black;height: 90px">
                     <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Sports items</strong></h3>
                  </div>
                  <div class="card-body text-center">
                     <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                     <a class="btn btn-primary btn-lg" aria-pressed="true" href="/inventorysports">Enter</a>
                     <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" disabled>{{$data['sports']}}</button></h4>
                  </div>

               </div>
            </div>


            <div class="col-md-4" >
               <div class="card1">
                  <div class="card-header" style="background-color: black;height: 90px">
                     <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>School Resources</strong></h3>
                  </div>
                  <div class="card-body text-center">
                     <h4 style="color: white"><strong>Check the current stock details</strong></h4><br>
                     <a class="btn btn-primary btn-lg" aria-pressed="true" href="/resource">Enter</a>
                     <h4 style="color: white;font-family: sans-serif">Items in stock :- <button type="button" class="btn btn-secondary btn-lg" name="resources" disabled>{{$data['resources']}}</button></h4>
                  </div>

               </div>
            </div>

            {{--sports items--}}
            <div class="col-md-4">
               <div class="card1">
                  <div class="card-header" style="background-color: black;height: 90px">
                     <h3 class=" card-title text-justify text-uppercase text-center cardheader" style="color: white;margin-top: auto;margin-bottom: auto"><strong>Supplier Details and Monthly Expenses</strong></h3>
                  </div>
                  <div class="card-body text-center">
                     <h4 style="color: white"><strong>Check the supplier details</strong></h4><br>
                     <a class="btn btn-primary btn-lg" aria-pressed="true" href="/supplier">Enter</a>
                     <h4 style="color: white;font-family: sans-serif">Monthly Expenses</h4>
                     <a class="btn btn-primary btn-lg" aria-pressed="true" href="/inventoryexpenses">Enter</a>
                  </div>

               </div>

            </div>
         </div>
      </div>
   </div>
</div>


@endsection