@extends('master')
@section('content')

<h1>Report</h1>
<hr>

<div>
    <table class="table table-bordered" style="text-align: center;">
        <thead class="thead-dark">

            <tr>
                <th colspan="1">SL</th>
                <th colspan="1">Product</th>
                <th colspan="2">Cash</th>
                <th colspan="2">Credit</th>
                <th colspan="2">MFS</th>
                <th colspan="2">Total</th>
            </tr>
            <td>
            <th></th>
            <th>Count</th>
            <th>Sum of amount</th>

            <th>Count</th>
            <th>Sum of amount</th>

            <th>Count</th>
            <th>Sum of amount</th>

            <th>Count</th>
            <th>Sum of amount</th>
            </td>

        </thead>
        <tbody>

            
            <tr>
                <th>{{+1}}</th>
                <td>{{$salesarr->name}}</td>

                <td>{{$cash->quantity}}</td>
                <td>{{$cash->total_amount}}</td>

                {{-- <td>{{$credit->quantity}}</td>
                <td>{{$credit->total_amount}}</td>
                
                
                <td>{{$mfs->quantity}}</td>
                <td>{{$mfs->total_amount}}</td> --}}

                <td></td>
                <td></td>
            </tr>

            
        </tbody>
    </table>
</div>
@endsection
