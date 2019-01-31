O neogelk é um pequeno webApp criado para acompanhar carteiras de investimentos.

//TODO:
- Colocar a cotação mais recente do dólar nas 2 queries de gráficos do dashboard (por tipo e por carteira).
- criar entidades "compras" e "vendas", 1 pra n em ativos, com cada compra/venda daquele ativo.
- Tela DASHBOARD incluir lucro vs inflação
- Cortar acesso aos CRUDs de tipos e títulos para permissões abaixo de 90.
- Permitir cadastro e edição de tipos e títulos, para usuários de baixa permissão, só enxergando os itens com o próprio user_id.
- mostrar moeda ao invés de "dolar" e "real" no saldo.
- Permitir user_id vazio nos cruds de tipo_titulo e titulo.

- Colocar botão "vender" em ativos/view. 
  - Dar a opção transferir o valor do ativo para um outro ativo (uma conta corrente, geralmente).
  - Para esta operação, pegar a cotação mais recente ou permitir salvar uma cotação e usar seu valor.
  

//referências
- https://github.com/FriendsOfCake/bootstrap-ui/blob/master/README.md (dicas de layout do plugin bolado com bootstrap 3)
- https://book.cakephp.org/3.0/en/deployment.html (como dar deploy da bagaça)
- https://github.com/PGBI/cakephp3-soft-delete (plugin de softdelete que uso)
- https://stackoverflow.com/questions/17873763/db-backup-function-in-cakephp (dar dump do BD)
