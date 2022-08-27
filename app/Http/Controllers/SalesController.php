<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Products;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sales::all();
        return view('pages.sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quantity=$request->quantity;
        $sell_rate=$request->sell_rate;
        $sales=Sales::create([
            'product_id'=>$request->product_id,
            'sell_rate'=>$request->sell_rate,
            'quantity'=>$request->quantity,
            'payment_mode'=>$request->payment_mode,
            'total_amount'=> $quantity * $sell_rate ,
        ]);

        $products = Products::where('id',$request->product_id)->first();
        $products_quantity = $products->available_qty;
        $products->update([
                'available_qty'=> $products_quantity - $quantity
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_id=Products::find($id);
        return view('pages.sales.create',compact('product_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
