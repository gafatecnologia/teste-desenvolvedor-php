@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Edição de clientes</h2>
                        <form action="{{route('clientes.update',['cliente'=>$cliente->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nome do Cliente</label>
                                    <input type="text" class="form-control" name="NomeCliente" placeholder="Nome do Cliente" required value="{{$cliente->NomeCliente}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>EMAIL</label>
                                    <input type="text" name="EMAIL" class="form-control" placeholder="EMAIL" required value="{{$cliente->EMAIL}}">
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="text" name="CPF" class="form-control" placeholder="xxx.xxx.xxx-xx"required value="{{$cliente->CPF}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
