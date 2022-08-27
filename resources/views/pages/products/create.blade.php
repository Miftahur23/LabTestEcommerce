@extends('master')
@section('content')
    

<h1>Add Products</h1>


<form action="{{route('products.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Products Name">
          </div>
          <div class="form-group col-6">
            <label for="buy_rate">Buy Rate</label>
            <input type="number" class="form-control" id="buy_rate" name="buy_rate" placeholder="Enter Buy Rate">
          </div>
          <div class="form-group col-6">
            <label for="sell_rate">Sell Rate</label>
            <input type="number" class="form-control" id="sell_rate" name="sell_rate" placeholder="Enter Sell Rate">
          </div>
          <div class="form-group col-6">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
          </div>

        </div>   
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection