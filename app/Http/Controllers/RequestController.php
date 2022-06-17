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
    public function index(Request $request)
    {
        $requests=DeliveryRequest::request()
        ->where(function($query) use ($request)
        {

            if ($request->has('product')) {
                $query->join('requests.product_id', '=', 'products.id')->where('requests.product_id','=',$request->product);
            }

            if ($request->has('user')) {
                $query->join('requests.user_id', '=', 'users.id')->where('requests.user_id','=',$request->user);
            }

            if ($request->has('status')) {
                $query->where('requests.status','=',$request->status);
            }

            if ($request->has('amount')) {
                $query->where('requests.amount','=',$request->amount);
            }

            if ($request->has('date')) {
                $query->where('requests.created_at','like', '%'.$request->date .'%');
            }
        })->paginate($request->qtdPerPage);

        if ($request->has('order')) {
            if($request->order==="4"){
                $item = ['requests' => DeliveryRequest::request()->orderBy('status', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="1"){
                $item = ['requests' => DeliveryRequest::request()->orderBy('product_id', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="2"){
                $item = ['requests' => DeliveryRequest::request()->orderBy('user_id', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="3"){
                $item = ['requests' => DeliveryRequest::request()->orderBy('amount', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="5"){
                $item = ['requests' => DeliveryRequest::request()->orderBy('created_at', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }
            

        }

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
        $deliveryRequest = DeliveryRequest::request()->find($id);

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
    public function destroy($id,Request $request)
    {
        $deliveryRequest = DeliveryRequest::find($id);
        $deliveryRequest->delete();
        
        
        $deliveryRequests = DeliveryRequest::request()->paginate($request->qtdPerPage);

        $item = ['requests' => $deliveryRequests];
        return response()->json($item,200);
    }

}