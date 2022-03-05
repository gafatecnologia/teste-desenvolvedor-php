<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

class ClienteController extends Controller
{
    /**
     * Pagina que lista os clientes
     */
    public function index()
    {
        $clientes = Cliente::paginate(20);
        return view('cliente.ListaCliente', ['clientes'=> $clientes]);
    }

    /**
     * Formulario de cadastro de clientes
     */
    public function create()
    {
        return view('cliente.Cadastrocliente');
    }

    /**
     * Salvando os dados adicionados no cadastro de clientes
     */
    public function add(Request $request){ 
        // dd($request);
        try{

            $dados = $request->validate([
                'CPF'  => ['required', new FormatoCpf]
                // outras validações aqui
            ]);
            $cliente = new Cliente;
            $cliente = $cliente->create($request->all());
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
        return Redirect::to('/clientes');
    }

    /**
     * Formulario de edição de clientes
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.EdicaoCliente',['cliente'=> $cliente]);
    }

    /**
     * Salvando os dados editados no formulario de clientes
     */
    public function update(Cliente $cliente, Request $request)
    {
        $cliente = $cliente->update($request->all());
        return Redirect::to('/clientes');
    }

    /**
     * Excluindo o cliente selecionado
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return Redirect::to('/clientes');
    }

    /**
     * Filtro de clientes através de qualquer um de seus campos
     */
    public function filter(Request $request)
    {
        $filters = $request->except('_token');
        $clientes = Cliente::where('CPF','LIKE',"%{$request->filter}%")
                         ->orWhere('NomeCliente','LIKE',"%{$request->filter}%")
                         ->orWhere('EMAIL','LIKE',"%{$request->filter}%")
                         ->paginate();
        return view('cliente.ListaCliente', compact('clientes','filters'));
    }
}
