@extends('master')
@section('content')

<h1>Products</h1>
<hr>
<a type="button" class="btn btn-success" href="{{route('products.create')}}">Add Products</a>
<br>
<br>
<div>
    <table class="table" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Sl No.</th>
                <th scope="col">Name</th>
                <th scope="col">Buy Rate</th>
                <th scope="col">Sell Rate</th>
                <th scope="col">Available Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$value)

            <tr>
                {{-- @dd($volunteers) --}}
                <th>{{$key+1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->buy_rate}}</td>
                <td>{{$value->sell_rate}}</td>
                <td>{{$value->available_qty}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('sales.edit',$value->id)}}">Sell</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
