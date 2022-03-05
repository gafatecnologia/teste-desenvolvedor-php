@extends('layout.app')
    @section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>Edição de produtos</h2>
                        <form action="{{route('produtos.update',['produto'=>$produto->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Código de barras</label>
                                    <input type="text" class="form-control" name="CodigoBarras" placeholder="Código de Barras" required value="{{$produto->CodBarras}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Valor</label>
                                    <input type="number" name="ValorUnitario" class="form-control" step="0.01" min="0" placeholder="Valor" required value="{{$produto->ValorUnitario}}">
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Nome do produto</label>
                                        <input type="text" name="NomeProduto" class="form-control" placeholder="Nome do Produto"required value="{{$produto->NomeProduto}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="Quantidade" class="form-control"required value="{{$produto->Quantidade}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
