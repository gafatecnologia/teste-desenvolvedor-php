@extends('layout.app')
    @section('conteudo')
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Cadastro de produtos</h2>
                        <form action="{{route('produtos.add')}}" method="POST">
                            @csrf
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Código de barras</label>
                                    <input type="text" class="form-control" name="CodBarras" placeholder="Código de Barras" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Valor</label>
                                    <input type="number" name="ValorUnitario" class="form-control" step="0.01" min="0" placeholder="Valor" required>
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Nome do produto</label>
                                        <input type="text" name="NomeProduto" class="form-control" placeholder="Nome do Produto"required>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="Quantidade" class="form-control"required >
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop