@extends('master')
@section('content')

@if ($message = Session::get('msg'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

<h1>Sell Products</h1>


<form action="{{route('sales.store')}}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{$product_id->id}}">

    <div class="row">
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product_id->name}}" disabled>
        </div>
        <div class="form-group col-6">
            <label for="sell_rate">Sell Rate</label>
            <input type="number" class="form-control" id="sell_rate" name="sell_rate"
                value="{{$product_id->sell_rate}}">
        </div>
        <div class="form-group col-6">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
        </div>
        <div class="form-group col-6">
            <label for="payment_mode">Payment Method</label>
            <select name="payment_mode" type="text" class="form-control" required>
                <option value="Cash">Cash</option>
                <option value="Credit">Credit</option>
                <option value="MFS">MFS</option>
            </select>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
