<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;

class PedidoController extends Controller
{
    /**
     * Pagina que lista os pedidos
     */
    public function index()
    {
        $pedidos = Pedido::paginate(20);
        
        //$pedido = Pedido::find(1);
        // $pedido = Pedido::all()->map(function($cliente){
        //     return $cliente->NomeCliente;});
    
        //$cliente = Cliente::where('id','2')->first();
        // $pedidos = Pedido::paginate();
        //$cliente = $pedido->cliente->nome;
        // $pedido = $cliente->pedido()->first();
        //dd($pedido->produto->NomeProduto);
        return view('pedido.ListaPedido', ['pedidos'=> $pedidos]);
        // $produtos = array();
        // foreach($pedidos as $pedido)
        //     foreach($pedido->produto as $produto)
        //         $produtos[] = $produto->NomeProduto;
        //     foreach($pedido->cliente as $cliente)
        //          $produto->NomeProduto;
        //          dd($produto->NomeProduto);
        // dd($produtos);
    }

    /**
     * Formulario de cadastro de pedidos
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedido.CadastroPedido',compact('clientes','produtos'));
    }

    /**
     * Salvando os dados adicionados no cadastro de pedidos
     */
    public function add(Request $request){ 

        $pedido = new Pedido;
        $pedido = $pedido->create($request->all());

        return Redirect::to('/pedidos');
    }

    /**
     * Formulario de edição de pedidos
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedido.Edicaopedido',compact('clientes','produtos','pedido'));
    }

    /**
     * Salvando os dados editados no formulario de pedidos
     */
    public function update(Pedido $pedido, Request $request)
    {
        $pedido = $pedido->update($request->all());
        return Redirect::to('/pedidos');
    }

    /**
     * Excluindo o pedido selecionado
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return Redirect::to('/pedidos');
    }

    /**
     * Filtro de pedidos através de qualquer um de seus campos
     */
    public function filter(Request $request)
    {
        $filters = $request->except('_token');
        $pedidos = pedido::where('DtPedido','LIKE',"%{$request->filter}%")
                         ->orWhere('NumeroPedido','LIKE',"%{$request->filter}%")
                         ->orWhere('Status','LIKE',"%{$request->filter}%")
                         ->paginate(20);
        return view('pedido.Listapedido', compact('pedidos','filters'));
    }
}
