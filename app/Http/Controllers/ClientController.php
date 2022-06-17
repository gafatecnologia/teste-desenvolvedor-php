<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends BaseController {

    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
    public function index(Request $request)
    {
        $clients = User::user()->where( function($query) use ($request){
            if ($request->has('name')) {
                $query->where('users.name','like', '%'.$request->name .'%');
            }

            if ($request->has('email')) {
                $query->where('users.email','like', '%'.$request->email .'%');
            }

            if ($request->has('date')) {
                $query->where('users.created_at','like', '%'.$request->date .'%');
            }
        })
        ->paginate($request->qtdPerPage);

        if ($request->has('order')) {
            if($request->order==="1"){
                $item = ['clients' => User::user()->orderBy('name', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="2"){
                $item = ['clients' => User::user()->orderBy('email', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }

            if($request->order==="3"){
                $item = ['clients' => User::user()->orderBy('created_at', 'asc')->paginate($request->qtdPerPage)];
                return response()->json($item,200);
            }
        }

        $item = ['clients' => $clients];
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

        $client = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $client->save();


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
        $client = User::user()->find($id);

        $item = ['client' => $client];
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
        $client = User::find($id);
        $client->update($request->all());
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
        $client = User::find($id);
        $client->delete();
        
        
        $clients = User::user()->paginate($request->qtdPerPage);

        $item = ['clients' => $clients];
        return response()->json($item,200);
    }

}