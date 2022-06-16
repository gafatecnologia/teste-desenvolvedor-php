<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController {

    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
    public function index()
    {
        $products = Product::get();

        $item = ['products' => $products];
        return response()->json($item,200);
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
    public function create()
    {
        //
    }

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store(Request $request)
    {

        $product = new Product([
            'name' => $request->input('name'),
            'bar_code' => $request->input('bar_code'),
            'unitary_value' => $request->input('unitary_value'),
        ]);
        $product->save();

        return response()->json(200);
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function show($id)
    {
        $product = Product::find($id);

        $item = ['product' => $product];
        return response()->json($item,200);
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function edit($id)
    {
        //
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->update($request->all());
        return response()->json(200);
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        
        $products = Product::get();

        $item = ['products' => $products];
        return response()->json($item,200);
    }

}