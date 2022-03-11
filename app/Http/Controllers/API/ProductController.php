<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index(Request $request)
    { 
    return Products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        
        $product = Products::create($request->all());

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
        $product = Products::find($id);
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
        $id = $request->id;

        $product = Products::find($id);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'update success',
            'product' => $product
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
        $product = Products::find($id);

        $product->delete();
        return response()->json(['success'=>true, 'message'=>'deleted']);
    }

    public function search($name)
    {
        $products = Products::where([
                ['name', 'like', '%'.$name.'%']
            ])->get();

        return $products;
    }
}
