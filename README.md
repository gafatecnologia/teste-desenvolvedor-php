## Instruções para execução

-Verificar no arquivo .env os detalhes da conexão como nome do banco e porta...

-Criação do banco de dados por meio de migrations executando o comando:
php artisan migrate

-Popular banco de dados por meio de Seeder/factory executando o comando:
php artisan db:seed --class=DatabaseSeeder

- Executar o projeto dentro do xampp ou através do comando php artisan serve e rodar qualquer uma dessas rotas que retorna uma lista repectiva.
http://localhost/teste-desenvolvedor-php/public/clientes/
http://localhost/teste-desenvolvedor-php/public/produtos/
http://localhost/teste-desenvolvedor-php/public/pedidos/

-No navBar da parte superior da tela é possivel navegar para outras ações de CRUD.


# Teste para candidatos à vaga de Desenvolvedor PHP

Olá desenvolvedor, nesse teste analisaremos seu conhecimento geral. Abaixo explicaremos tudo o que será necessário para você realizar da melhor forma seu teste.

## Instruções

O desafio consiste em implementar uma aplicação Web simples utilizando o framework PHP Laravel, e um banco de dados relacional MySQL ou Postgres, a partir de uma modelagem de dados inicial.

Você vai criar uma aplicação de cadastro de pedidos de compra, com as seguintes funcionalidades:

- CRUD de clientes.
- CRUD de produtos.
- CRUD de pedidos de compra, com status (Em Aberto, Pago ou Cancelado).
- Cada CRUD:
  - deve ser filtrável e ordenável por qualquer campo, e possuir paginação de 20 itens.
  - deve possuir formulários para criação e atualização de seus itens.
  - deve permitir a deleção de qualquer item de sua lista.
- Barra de navegação entre os CRUDs.
- Links para os outros CRUDs nas listagens (Ex: link para o detalhe do cliente da compra na lista de pedidos de compra)


## Modelo de dados

A modelagem inicial para a implementação solução é a seguinte:

| Nome Coluna         |  Data Type          |
| ------------------- | ------------------- |
|  NumeroPedido       |  int                |
|  NomeCliente        |  Varchar(100)       |
|  CPF                |  char(11)           |
|  EMAIL              |  nchar(10)          |
|  DtPedido           |  smalldatetime      |
|  CodBarras          |  varchar(20)        |
|  NomeProduto        |  varchar(100)       |
|  ValorUnitario      |  money              |
|  Quantidade         |  int                |

Além disso, a implementação deste modelo em um banco de dados relacional deve ser realizada levando em consideração os seguintes requisitos:

- O banco de dados deve ser criado utilizando Migrations do framework Laravel, e também utilizar Seeds e Factorys para popular as informações no banco de dados.
- Implementação das validações necessárias na camada que julgar melhor.

## Tecnologias a serem utilizadas
Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS
- Javascript
- Framework Laravel (PHP)
- Docker (se souber para montar o ambiente de dev)

## Entrega

- Para iniciar o teste, faça um fork deste repositório; 
- Crie uma branch com o seu nome;
- Altere o arquivo readme.md com as informações necessárias para executar o seu teste e caso queira colocar alguma instrução a mais;
- Depois de finalizado, envie-nos o pull request;

## Bônus

- Permitir que o usuário mude o número de itens por página.
- Implementar a camada de Front-End utilizando a biblioteca javascript Bootstrap e ser responsiva.
- API Rest JSON para todos os CRUDS listados acima.

## O que iremos analisar

- Organização do código;
- Aplicação de design patterns;
- Separação de módulos e componentes;

### Boa sorte!