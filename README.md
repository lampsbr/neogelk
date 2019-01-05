O neogelk é um pequeno webApp criado para acompanhar carteiras de investimentos.

//TODO:
- Tela DASHBOARD incluir lucro vs inflação
- Implementar índices para comparar os investimentos.
- Cadastrar tipos, títulos e ativos automaticamente com o login do usr.
- Só exibir no dropdown de títulos (ativos/add, por exemplo) aqueles com user_id = null ou user_id = usuário logado.
- Cadastrar dividendos por ativo. Nova tabela (dividendos ou proventos).
- mostrar moeda ao invés de "dolar" e "real" no saldo.
- Permitir agrupar ativos de algum jeito. Criar "carteira", "grupo", "corretora" ou algo assim.

//referências
- https://github.com/FriendsOfCake/bootstrap-ui/blob/master/README.md (dicas de layout do plugin bolado com bootstrap 3)
- https://book.cakephp.org/3.0/en/deployment.html (como dar deploy da bagaça)
- bin/cake cache clear_all //limpar cache depois de um deployzão
- https://github.com/PGBI/cakephp3-soft-delete (plugin de softdelete que usei. Ainda não testado kkkkk)
