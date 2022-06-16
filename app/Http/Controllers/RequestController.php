<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\User;
use App\Models\DeliveryRequest;
use Illuminate\Http\Request;

class RequestController extends BaseController {

    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
    public function index()
    {
        $requests = DeliveryRequest::request()->get();

        $item = ['requests' => $requests];
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

        $deliveryRequest = new DeliveryRequest([
            'user_id' => $request->input('user_id'),
            'status' => $request->input('status'),
            'amount' => $request->input('amount'),
            'product_id' => $request->input('product_id'),
        ]);

        $deliveryRequest->save();

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
        $deliveryRequest = DeliveryRequest::find($id);

        $item = ['request' => $deliveryRequest];
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

        $deliveryRequest = DeliveryRequest::find($id);
        $deliveryRequest->update($request->all());
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
        $deliveryRequest = DeliveryRequest::find($id);
        $deliveryRequest->delete();
        
        
        $deliveryRequests = DeliveryRequest::request()->get();

        $item = ['requests' => $deliveryRequests];
        return response()->json($item,200);
    }

}