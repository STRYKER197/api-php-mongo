<h1>freelancer-catalog-api</h1>

Uma API Restful simples utilizando PHP, criada por Rodrigo Silva para o trabalho final de Tópicos Especiais em Banco de Dados.

- > Requisitos
  1. Xampp
  2. Postman
  3. MongoDB
  4. Apache com PHP 5.6
- > Instalação
  1. Baixar e/ou clonar o projeto.
  2. Acessar a página https://docs.mongodb.com/ecosystem/drivers/php/ e baixar o driver respectivo para a sua versão do apache. Ex: php_mongodb-1.1.7-5.6-ts-vc11-x86
  3. Baixar e instalar o MongoDB 3.6
- > Execução
  1. Para executar, basta iniciar o xampp e acessar a página http://localhost/phpmongodb/api.php
  2. Para iniciar as requisições, recomenda-se o uso do programa 'POSTMAN'. 
  
# Exemplos de requisição
    -GET
    Ex: - Listar um Usuario Especifico:
          localhost/phpmongodb/api.php?nome=Rodrigo
        - Listar todos os usuarios da base.
          localhost/phpmongodb/api.php
    -POST
    Ex: - Cadastrar um novo usuario:
          (
              [nome] => Carmen Cortes 2
              [cpf] => 21112
              [telefone] => 12312312
              [escolaridade] => Medio
              [especialiadade] => Estudante2 
          )
     -DELETE
    Ex: - Deletar um usuario:
         (
              [nome] => Carmen Cortes
         )
     -PUT
    Ex: -Atualizar todos os dados de um usuario:
     (
              [nome] => Carmen Cortes 2
              [cpf] => 21112
              [telefone] => 12312312
              [escolaridade] => Medio
              [especialiadade] => Estudante2 
      )
    -PATCH
    Ex: -Atualizar o nome de um usuario:
     (
              [cpf] => 21112
              [nome] => Carmen Cortes 2

     )
         

  
