@extends('layout.app')
    @section('conteudo')
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Cadastro de pedidos</h2>
                        <form action="{{route('pedidos.add')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Numero do Pedido</label>
                                    <input type="number" class="form-control" name="NumeroPedido" placeholder="Numero do Pedido" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Data do Pedido</label>
                                    <input type="datetime-local" name="DtPedido" class="form-control" placeholder="Data do Pedido" required>
                                </div>
                            </div>

                            <select class="form-select" aria-label="Default select example" name="Status" required>
                                <option value="">Selecione status do pedido</option>
                                <option value="Pago">Pago</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Em Aberto">Em Aberto</option>
                            </select>    
                            <select class="form-select" aria-label="Default select example" name="ClienteId" required>
                                <option value="">Selecione cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->NomeCliente }} </option>
                                @endforeach
                            </select>
                            <select class="form-select" aria-label="Default select example" name="ProdutoId" required> 
                            <option value="">Selecione produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->NomeProduto }} </option>
                                @endforeach  
                            </select>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
