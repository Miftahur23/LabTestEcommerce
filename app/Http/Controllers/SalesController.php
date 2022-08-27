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
        $products=Products::all();

        foreach($sales as $key=>$value)
        {
            $salesarr=Products::where('id',$value->product_id)->first();
        }

        $cash=Sales::where('payment_mode','Cash')->
        where('product_id',$salesarr->id,)->first();
        //dd($cash);

        $credit=Sales::where('payment_mode','Credit')->
        where('product_id',$salesarr->id,)->get();

        $mfs=Sales::where('payment_mode','MFS')->
        where('product_id',$salesarr->id,)->get();
           
        return view('pages.sales.index',compact('salesarr','cash','credit','mfs'));
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
        $sales=Sales::where('product_id',$request->product_id)->first();
        
        if($sales)
        {
            $method=$request->payment_mode;
            $match=Sales::where('payment_mode',$method)->first();

            if($match && $method == 'Cash') 
            {
                $quantity= $quantity + $match->quantity;
                $total_amount= $quantity * $sell_rate;

                $match->update([
                    'quantity'=> $quantity,
                    'total_amount'=> $total_amount ,
                ]);
            }
            elseif($match && $method =='Credit')
            {
                $quantity= $quantity + $match->quantity;
                $total_amount= $quantity * $sell_rate;

                $match->update([
                    'quantity'=> $quantity,
                    'total_amount'=> $total_amount ,
                ]);
            }
            elseif($match && $method =='MFS')
            {
                $quantity= $quantity + $match->quantity;
                $total_amount= $quantity * $sell_rate;

                $match->update([
                    'quantity'=> $quantity,
                    'total_amount'=> $total_amount ,
                ]);
            }
            else
            {
                $total_amount= $quantity * $sell_rate;
                Sales::create([
                    'product_id'=>$request->product_id,
                    'sell_rate'=>$sell_rate,
                    'quantity'=> $quantity,
                    'payment_mode'=>$request->payment_mode,
                    'total_amount'=> $total_amount ,
                ]);

            }
            
        }
        else
        {
            Sales::create([
                'product_id'=>$request->product_id,
                'sell_rate'=>$request->sell_rate,
                'quantity'=>$request->quantity,
                'payment_mode'=>$request->payment_mode,
                'total_amount'=> $quantity * $sell_rate ,
            ]);
        }

        $products = Products::where('id',$request->product_id)->first();
        $products_quantity = $products->available_qty;
        if($products_quantity > $quantity )
        {
            $products->update([
                'available_qty'=> $products_quantity - $quantity
        ]);
        }
        else
        {
            return redirect()->back()->with('msg','Insufficient Stock');
        }
        

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
