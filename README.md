Adicionar instruções gerais e TODO aqui. =]

//TODO:
- Adicionar botão ao dashboard para pedir cotação do ticker
  - tentar limpar o nome do ticker
  - contactar o alphavantage
  - caso dê ruim, avisar
  - caso sucesso, salvar a cotação e avisar ao usr.
- Ao ativos/add, redirecionar para dashboard ao invés de ativos/index.
- Todos dropdowns de ativos devem conter seu título e, caso não nulo, seu ticker entre parênteses.
- Tela DASHBOARD incluir lucro vs inflação
- Implementar índices para comparar os investimentos.
- Cadastrar tipos, títulos e ativos automaticamente com o login do usr.
- Só exibir CRUD de usuários caso permissao >=90 (admin threshold).
- Só exibir no dropdown de títulos (ativos/add, por exemplo) aqueles com user_id = null ou user_id = usuário logado.
- Cadastrar dividendos por ativo. Nova tabela (dividendos ou proventos).
- mostrar moeda ao invés de "dolar" e "real" no saldo.
- Permitir agrupar ativos de algum jeito. Criar "carteira", "grupo", "corretora" ou algo assim.
//referências
- https://github.com/FriendsOfCake/bootstrap-ui/blob/master/README.md (dicas de layout do plugin bolado com bootstrap 3)
- https://book.cakephp.org/3.0/en/deployment.html (como dar deploy da bagaça)
- bin/cake cache clear_all //limpar cache depois de um deployzão
- https://github.com/PGBI/cakephp3-soft-delete (plugin de softdelete que usei. Ainda não testado kkkkk)
