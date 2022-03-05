@extends('layout.app')
    @section('conteudo')
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Cadastro de Clientes</h2>
                        <form action="{{route('clientes.add')}}" method="POST">
                            @csrf
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nome do Cliente</label>
                                    <input type="text" class="form-control" name="NomeCliente" placeholder="Nome do Cliente" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="EMAIL" class="form-control" placeholder="Email" required>
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="text" name="CPF" class="form-control" placeholder="xxx.xxx.xxx-xx" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop