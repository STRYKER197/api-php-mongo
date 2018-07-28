<?php
require "vendor/autoload.php";

$client = new MongoDB\Client;

$companydb23 = $client->companydb23;
$freelancer = $companydb23->freelancer;

// APAGAR BASE DE DADOS
// $result3 = $client->dropDatabase('companydb');
// var_dump($result3);
// LISTAR DBS
foreach($client->listDatabases() as $db){
    var_dump($db);
}

// APAGAR COLLECTION
// $result2 = $companydb23->dropCollection('empcollection');
// var_dump($result2);

// LISTAR COLLECTION
foreach($companydb23->listCollections() as $collections){
    var_dump($collections);
}

// CRIAR COLLECTION
// $result1 = $companydb23->createCollection('empcollection');

// var_dump($result1);

// $insertVariosResultados = $freelancer->insertMany([
//     ['nome'=>'Teste 1', 'cpf'=>'12312312326', 'telefone'=>'11111111111', 'escolaridade'=>'26', 'especialiadade'=>'26'],
//     ['nome'=>'Teste 2', 'cpf'=>'123123126', 'telefone'=>'222222222222', 'escolaridade'=>'26', 'especialiadade'=>'26'],
//     ['nome'=>'Teste 3', 'cpf'=>'12312312326', 'telefone'=>'3333333333333', 'escolaridade'=>'26', 'especialiadade'=>'26'],
//     ['nome'=>'Teste 4', 'cpf'=>'12312326', 'telefone'=>'44444444444444', 'escolaridade'=>'26', 'especialiadade'=>'26'],
//     ['nome'=>'Teste 5', 'cpf'=>'12312312326', 'telefone'=>'25555555555', 'escolaridade'=>'26', 'especialiadade'=>'26'],
//     ['nome'=>'Teste 6', 'cpf'=>'26123123123', 'telefone'=>'666666666', 'escolaridade'=>'26', 'especialiadade'=>'26'],
// ]);

// printf('Inserted %d documents', $insertVariosResultados->getInsertedCount());

?>