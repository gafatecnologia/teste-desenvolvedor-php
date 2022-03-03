<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/')}}">Voltar</a>
                </div>
                    <h2>Cadastro de produtos</h2>
                    <form action="{{url('produtos/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Código</label>
                                <input type="number" class="form-control" name="codigo" placeholder="Código" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">Preço</label>
                                <input type="number" name="preco" class="form-control" step="0.01" min="0" placeholder="Preço" required>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Categoria</label>
                                    <input type="text" name="categoria" class="form-control" placeholder="Categoria"required>
                                </div>
                                <div class="form-group col-md-4" >
                                    <label>Selecione até 3 imagens</label>
                                    <input type="file" name="imagem[]" multiple>
                                </div>
                            </div>
                            <div class="form-group">
                              <label>Composição</label>
                              <textarea name="composicao" class="form-control" cols="30" rows="3" placeholder="Composição" required></textarea>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputCity">Nome</label>
                                <input type="text" class="form-control" name="nome" required >
                              </div>
                              <div class="form-group col-md-4">
                                <label>Tamanho</label>
                                <select name="tamanho" class="form-control" required>
                                  <option selected>Escolher...</option>
                                  <option value="PP">PP</option>
                                  <option value="P">P</option>
                                  <option value="M">M</option>
                                  <option value="G">G</option>
                                  <option value="GG">GG</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" class="form-control"required >
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
</body>
</html>
