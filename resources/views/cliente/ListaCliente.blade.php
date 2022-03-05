@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/')}}">Voltar</a>
                        <h2>Lista de clientes</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome do Cliente</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($clientes as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <th scope="row">{{$c->NomeCliente}}</th>
                            <td>{{$c->EMAIL}}</td>
                            <td>{{$c->CPF}}</td>
                            <td>
                                <a href="clientes/edit/{{$c->id}}" class="btn btn-warning">Editar</button>
                            </td>
                            <td>
                                <form action="{{route('clientes.destroy', ['cliente'=> $c->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="cliente" value="{{$c->id}}">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($filters))
                        {{ $clientes->appends($filters)->links() }}
                    @else
                        {{ $clientes->links() }}
                    @endif
                    </div>
                </div>
                <form action="{{route('clientes.filter')}}" class="form-inline" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" name="filter" type="search" placeholder="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
               </form>
            </div>
        </div>
    @stop

