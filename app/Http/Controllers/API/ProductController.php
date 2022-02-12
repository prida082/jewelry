<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->role;
        //
        //return response()->json(['request'=>$request->all()]);
        $user_id = $request->user()->id??0;

        $page = $request->page??1;
        $itemsPerPage = $request->itemsPerPage??10;

        $pagination = Product::where('user_id', $user_id)->paginate($itemsPerPage, ['*'], 'page', $page);
        $products = $pagination->items();

        //$page = 1;
        //$itemsPerPage = 10;


        return response()->json([
            'success'   =>  true,
            'products'  =>  $products,
            'pagination'=>  $pagination,

        ]);
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

        $user = $request->user();
        $user_id = $user->id;

        $request->validate([
            'name'          =>  'required',
            'description'   =>  'required',
            'price'         =>  'required',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->user_id = $user_id;
        $product->save();

        return $product;
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
        $product = Product::find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //dd($request->all());
        $id = $request->id;

        $product = Product::find($id);
        //dd($product);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return response()->json([
            'success'=>true,
            'message'=>'update success',
            'product'=>$product
        ]);
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
        $product = Product::find($id);

        $product->delete();
        return response()->json(['success'=>true, 'message'=>'deleted']);
    }

    public function search($name)
    {
        $products = Product::where([
                ['name', 'like', '%'.$name.'%']
            ])->get();

        return $products;
    }
}
