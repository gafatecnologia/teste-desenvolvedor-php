<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(20);
        return view('produto.ListaProduto', ['produtos'=> $produtos]);
    }

    public function create()
    {
        return view('produto.CadastroProduto');
    }

    public function add(Request $request){ 

        $produto = new Produto;
        $produto = $produto->create($request->all());

        return Redirect::to('/produtos');
    }

    public function edit(Produto $produto)
    {
        return view('produto.EdicaoProduto',['produto'=> $produto]);
    }

    public function update(Produto $produto, Request $request)
    {
        $produto = $produto->update($request->all());
        return Redirect::to('/produtos');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return Redirect::to('/produtos');
    }

    public function filter(Request $request)
    {
        $filters = $request->except('_token');
        $produtos = Produto::where('CodBarras','LIKE',"%{$request->filter}%")
                         ->orWhere('NomeProduto','LIKE',"%{$request->filter}%")
                         ->orWhere('ValorUnitario','LIKE',"%{$request->filter}%")
                         ->orWhere('Quantidade','LIKE',"%{$request->filter}%")
                         ->paginate(2);
        return view('produto.ListaProduto', compact('produtos','filters'));
    }
}
