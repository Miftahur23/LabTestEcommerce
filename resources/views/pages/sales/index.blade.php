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
                  @foreach($sales as $key=>$value)
                          <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$value->products->name}}</td>
                            <td>@php
                              $count1=0;
                                if($value->payment_mode=='Cash')
                                $count1=$value->quantity;
                                $amount1=$value->total_amount;
                            @endphp
                            {{$count1}}
                          </td>
                            <td>{{$amount1}}</td>
                            <td>
                              @php
                              $count2=0;
                                if($value->payment_mode=='Credit')
                                $count2=$value->quantity;
                                $amount2=$value->total_amount;
                            @endphp
                            {{$count2}}
                            </td>
                            <td>{{$amount2}}</td>
                            <td>@php
                              if($value->payment_mode=='MFS')
                              $count3=0;
                              $count3=$value->quantity;
                                $amount3=$value->total_amount;
                          @endphp
                          {{$count3}}
                          </td>
                            <td>{{$amount3}}</td>
                            <td>{{$count1+$count2+$count3}}</td>
                            <td>{{$amount1+$amount2+$amount3}}</td>
                          </tr>

                  @endforeach
                </tbody>
              </table>
</div>
@endsection
