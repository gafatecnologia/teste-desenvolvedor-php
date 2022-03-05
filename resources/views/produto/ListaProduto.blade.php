@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/')}}">Voltar</a>
                        <h2>Lista de produtos</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">CodBarras</th>
                                <th scope="col">NomeProduto</th>
                                <th scope="col">ValorUnitario</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($produtos as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <th scope="row">{{$p->CodBarras}}</th>
                            <td>{{$p->NomeProduto}}</td>
                            <td>{{$p->ValorUnitario}}</td>
                            <td>{{$p->Quantidade}}</td>
                            
                            <td>
                                <a href="produtos/edit/{{$p->id}}" class="btn btn-warning">Editar</button>
                            </td>
                            <td>
                                <form action="{{route('produtos.destroy', ['produto'=> $p->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="produto" value="{{$p->id}}">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($filters))
                        {{ $produtos->appends($filters)->links() }}
                    @else
                        {{ $produtos->links() }}
                    @endif
                    </div>
                </div>
                <form action="{{route('produtos.filter')}}" class="form-inline" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" name="filter" type="search" placeholder="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
               </form>
            </div>
        </div>
    @stop

