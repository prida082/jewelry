<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();

        return view('baskets.index')->with('order', $order);
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
        //
        $product = Products::find($request->product_id);
        $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
        // check that user already have a product in cast or not if not create a order
        if ($order) {
            $order_Detail = $order->order_details()->where('product_id', $product->id)->first();

            if ($order_Detail) {
                $newAmount = $order_Detail->amount + 1;
                $order_Detail->update([
                    'amount' => $newAmount
                ]);
            } else {
                $prepareCartDetail = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'amount' => 1,
                    'price' => $product->price,
                ];
                $order_Detail = OrderDetail::create($prepareCartDetail);
            }
        } else {
            $prepareCart = [
                'status' => 0,
                'user_name' => Auth::user()->name,
                'total' => 0,
                'user_id' => Auth::id()
            ];
            $order = Order::create($prepareCart);

            $prepareCartDetail = [
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'amount' => 1,
                'price' => $product->price,
            ];
            $order_Detail = OrderDetail::create($prepareCartDetail);
        }

        $sum = 0;
        $total = $order->order_details->map(function ($order_Detail) use ($sum) {
            $sum += $order_Detail->amount * $order_Detail->price;
            return $sum;
        })->toArray();

        $order->update([
            'total' => array_sum($total)
        ]);

        // $order->update([
        //     'status' => 1
        // ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if ($request->value = 'checkout') {
            $order->where('id',$request->id)->update([
                'status' => 1
            ]);
        }



        $totalRaw = 0;
        $total = $order->order_details->map(function ($orderDetail) use ($totalRaw) {
            $totalRaw += $orderDetail->amount * $orderDetail->price;
            return $totalRaw;
        })->toarray();

        $order->update([
            'total' => array_sum($total)
        ]);

        return redirect()->route('baskets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
