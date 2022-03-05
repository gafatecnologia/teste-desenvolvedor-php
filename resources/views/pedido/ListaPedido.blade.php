@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h2>Lista de pedidos</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Numero do Pedido</th>
                                <th scope="col">Data do Pedido</th>
                                <th scope="col">Status</th>
                                <th scope="col">CPF do cliente</th>
                                <th scope="col">Nome do Produto</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($pedidos as $p)
                        <tr>
                            <td>#</td>
                            <th scope="row">{{$p->NumeroPedido}}</th>
                            <td>{{$p->DtPedido}}</td>
                            <td>{{$p->Status}}</td>
                            <td>{{$p->cliente->CPF}}</td>
                            @foreach($p->produto as $prod)
                                <td>{{$prod->NomeProduto}}</td>
                            @endforeach
                            <td>
                                <a href="pedidos/edit/{{$p->id}}" class="btn btn-warning">Editar</button>
                            </td>
                            <td>
                                <form action="{{route('pedidos.destroy', ['pedido'=> $p->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="pedido" value="{{$p->id}}">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($filters))
                        {{ $pedidos->appends($filters)->links() }}
                    @else
                       {{ $pedidos->links() }}
                    @endif
                    </div>
                </div>
                <form action="{{route('pedidos.filter')}}" class="form-inline" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" name="filter" type="search" placeholder="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
               </form>
            </div>
        </div>
    @stop

