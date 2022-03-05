@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Edição de pedidos</h2>
                        <form action="{{route('pedidos.update',['pedido'=>$pedido->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Numero do Pedido</label>
                                    <input type="number" class="form-control" name="NumeroPedido" placeholder="Numero do Pedido" value="{{$pedido->NumeroPedido}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Data do Pedido</label>
                                    <input type="datetime-local" name="DtPedido" class="form-control" placeholder="Data do Pedido" value="{{$pedido->DtPedido}}" required>
                                </div>
                            </div>

                            <select class="form-select" aria-label="Default select example" name="Status" value="{{$pedido->Status}}"  required>
                                <option value="Pago">Pago</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Em Aberto">Em Aberto</option>
                            </select>  
                            <select class="form-select" aria-label="Default select example" name="ClienteId" value="{{ $pedido->ClienteId }}"> required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->NomeCliente }} </option>
                                @endforeach
                            </select>
                            <select class="form-select" aria-label="Default select example" name="ProdutoId" value="{{ $pedido->ProdutoId }}" required> 
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->NomeProduto }} </option>
                                @endforeach  
                            </select>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
