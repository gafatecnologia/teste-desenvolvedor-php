# Executando o ambiente
Olá, para conseguir rodar esta aplicação, é necessario configurar o ambiente Docker.
Primeiro assegure-se de ter o docker instalado. O arquivo docker-compose.yml conta com uma imagem do MySQL, PHPMyAdmin, e algumas outras imagens que podem auxiliar em projetos laravel como o Selenium e o Redis.

- Primeiro crie um arquivo .env na sua pasta raiz. Copie o conteudo do arquivo .env.example para o arquivo .env recem criado.
- Execute o composer install e depois o yarn install (ou npm install).
- Se as configurações forem executadas corretamente, poderemos passar para a parte de povoamento do banco de dados.
- Juntamente com o comando do Docker execute o comando * php artisan migrate *.
- Você pode conferir se as tabelas foram criadas acessando o PHPMyAdmin que estara sendo executado na porta 8081. As credenciais estão informadas no arquivo .env, "usuario":"sail" - "senha":"password".
- Com o banco de dados devidamente criado e as tabelas presentes, resta apenas inserir informações nelas por meio de seeders. Execute o comando * php artisan migrate * php artisan db:seed * e depois que ele terminar de popular as tabelas, podemos acessar a aplicação.

- O sistema foi construido com um front-end em VUE.js, com JavaScript e scss. A API foi construida com o Laravel, gerando apenas as informações em JSON para serem consumidas pelas paginas VUE. Como Vue é outra tecnologia, é preciso executar o comando * yarn watch * para executar o front e logo em segura acesse a rota raiz localhost.

- O sistema contem 3 CRUD's, sendo um de Produtos, outro de Clientes e outro de Pedidos interagindo entre as tabelas.

# O CRUD de Produtos

- O CRUD de Produtos conta com uma listagem de todos os produtos cadastrados no banco de dados, dando a opção de excluir, editar, e visualizar a informação referente a uma determinada linha na tabela.

- É possivel fazer filtragem tanto pelo nome do produto, quanto pelo codigo de barras ou data que deseje verificar.

# O CRUD de Clientes

- O CRUD de Clientes conta com uma listagem de todos os clientes cadastrados no banco de dados, dando a opção de excluir, editar, e visualizar a informação referente a uma determinada linha na tabela.

- É possivel fazer filtragem tanto pelo nome do produto, quanto pelo email ou data que deseje verificar.

# O CRUD de Clientes

- O CRUD de Pedidos funciona de forma um pouco mais diferenciada já que conta com as mesmas especificidades dos CRUD's anteriores, mas com mais filtros e mais informações, como status do pedido, filtragem por cliente, por produto e pelo status. Com as informações já inseridas é possivel testar, e ver as funcionalidades. Se um Cliente ou Produto for excluido, o pedido referente a ele tambem será.
