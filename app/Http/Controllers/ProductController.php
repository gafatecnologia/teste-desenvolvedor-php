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
    public function index(Request $request)
    {
        $products = Product::product()->where(
            function($query) use ($request){
                if ($request->has('name')) {
                    $query->where('products.name','like', '%'.$request->name .'%');
                }

                if ($request->has('bar_code')) {
                    $query->where('products.bar_code','like', '%'.$request->bar_code .'%');
                }

                if ($request->has('unitary_value')) {
                    $query->where('products.unitary_value','like', '%'.$request->unitary_value .'%');
                }

                if ($request->has('date')) {
                    $query->where('products.created_at','like', '%'.$request->date .'%');
                }
            }
        )
        ->paginate($request->qtdPerPage);

        if ($request->has('order')) {
            if($request->order==="1"){
                $item = ['products' => Product::product()->orderBy('name', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="2"){
                $item = ['products' => Product::product()->orderBy('bar_code', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="3"){
                $item = ['products' => Product::product()->orderBy('unitary_value', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="4"){
                $item = ['products' => Product::product()->orderBy('created_at', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }
        }

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
        $product = Product::product()->find($id);

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
    public function destroy($id,Request $request)
    {
        $product = Product::find($id);
        $product->delete();
        
        
        $products = Product::product()->paginate($request->qtdPerPage);

        $item = ['products' => $products];
        return response()->json($item,200);
    }

}