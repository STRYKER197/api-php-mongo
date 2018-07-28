<?php
    require "vendor/autoload.php";
    error_reporting(0);

    $client = new MongoDB\Client;

    $freelancer = $client->freelancer;

    // Metodo para insercao de dados no banco
    // insertDataOnDabatase($freelancer); 

    switch($_SERVER["REQUEST_METHOD"]){
        // GET - Consultas
        case "GET":
            $c1 = $client->selectCollection("freelancer","usuario");
            $c2 = $freelancer->usuario;
            $count = 0;
            if(isset($_GET["nome"])){
                $cursor = $c2->find(
                    ['nome' => $_GET["nome"]]
                );
                foreach ($cursor as $obj) {
                    $count++;
                    $arrJson[] = array('nome' => $obj->nome, 'cpf' => $obj->cpf, 'telefone' => $obj->telefone, 'especialiadade' => $obj->especialiadade, 'escolaridade' => $obj->escolaridade); 
                }

                if($count == 0){
                    $arrJson[] = array('message' => "Nenhum documento encontrado!");
                }
            } else {
                $cursor = $c1->find();
                foreach ($cursor as $obj) {
                    $count++;
                    $arrJson[] = array('nome' => $obj->nome, 'cpf' => $obj->cpf, 'telefone' => $obj->telefone, 'especialiadade' => $obj->especialiadade, 'escolaridade' => $obj->escolaridade); 
                }
                if($count == 0){
                    $arrJson[] = array('message' => "Nenhum documento encontrado!");
                }
                
            }
            echo json_encode($arrJson);
            break;
        // PUT - Atualização de dados
        case "PATCH":
            $c2 = $freelancer->usuario;
            $idCpf = $_GET['cpf'];
            $nome = $_GET['nome'];
            if ($idCpf == "") {
                $txtMessage = "CPF nao preenchido.";
            } else {
                $updateResult = $c2->updateOne(
                    ['cpf' => "$idCpf"],
                    ['$set' => ['nome' => "$nome"]]
                );
                $txtMessage = "Registro alterado";
            }

            $arrJson[] = array('message' => "$txtMessage");
            echo json_encode($arrJson);
            break;
        // POST - Criação de novos registros	
        case "POST":
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $escolaridade = $_POST['escolaridade'];
            $especialiadade = $_POST['especialiadade'];
                print_r($_POST);
            if ($nome == "" || $cpf == "" || $telefone == "" || $escolaridade == "" || $especialiadade == "") {
                $arrJson[] = array('message' => "Erro, todos os campos sao obrigatorios");
            } else {
                $c1 = $freelancer->usuario;
                $insertResult = $c1->insertOne(['nome'=>$nome, 'cpf'=>$cpf, 'telefone'=>$telefone, 'escolaridade'=>$escolaridade, 'especialiadade'=>$especialiadade]);
                $arrJson[] = array('message' => "Usuario Cadastrado com Sucesso!");
            }
            echo json_encode($arrJson);
            break;
        // Removação de registros
        case "DELETE":
            $nome = $_GET['nome'];
            $c1 = $freelancer->usuario;
            if($nome == ""){
                $arrJson[] = array('message' => "Erro, todos os campos sao obrigatorios");
            } else {
                $deleteResult = $c1->deleteOne(['nome' => $nome]);
                $arrJson[] = array('message' => "Usuario deletado com Sucesso!");
            }
            echo json_encode($arrJson);

            break;
        case "PUT":
        $c2 = $freelancer->usuario;
        $idCpf = $_GET['cpf'];
        $cpf = $_GET['cpf'];
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];
        $escolaridade = $_GET['escolaridade'];
        $especialiadade = $_GET['especialiadade'];

        if ($idCpf == "") {
            $txtMessage = "CPF nao preenchido.";
        } else {
            if ($nome == "" || $cpf == "" || $telefone == "" || $escolaridade == "" || $especialiadade == "") {
                $txtMessage = "Erro, todos os campos sao obrigatorios";
            } else {
                $updateResult = $c2->updateOne(
                    ['cpf' => "$idCpf"],
                    ['$set' => ['nome' => "$nome", 'telefone' => "$telefone", 'cpf' => "$cpf", 'escolaridade' => "$escolaridade", 'escolaridade' => "$escolaridade", 'especialiadade' => "$especialiadade"]]
                );
                $txtMessage = "Registro alterado";
            }
        }

            $arrJson[] = array('message' => "$txtMessage");
            echo json_encode($arrJson);
            break;
        default:
            $return['message'] = "Método ".$_SERVER["REQUEST_METHOD"]." nao autorizado.";
            echo json_encode($return);
            break;
    }

    function insertDataOnDabatase ($freelancer) {
        $c2 = $freelancer->usuario;
        $insertVariosResultados = $c2->insertMany([
            ['nome'=>'Teste 1', 'cpf'=>'81148658734', 'telefone'=>'31999622749', 'escolaridade'=>'Fundamental', 'especialiadade'=>'Enfermagem em Nefrologia'],
            ['nome'=>'Teste 2', 'cpf'=>'43279194628', 'telefone'=>'923199622749', 'escolaridade'=>'Médio', 'especialiadade'=>'Gerontologia e Qualidade de Vida'],
            ['nome'=>'Teste 3', 'cpf'=>'68624285780', 'telefone'=>'93299622749', 'escolaridade'=>'Superior', 'especialiadade'=>'Enfermagem Oncológica'],
            ['nome'=>'Teste 4', 'cpf'=>'23424584878', 'telefone'=>'91199622749', 'escolaridade'=>'Pós-graduação', 'especialiadade'=>'Direito Civil'],
            ['nome'=>'Teste 5', 'cpf'=>'45856945603', 'telefone'=>'9213622749', 'escolaridade'=>'Pós-graduação', 'especialiadade'=>'Direito trabalhista'],
            ['nome'=>'Teste 6', 'cpf'=>'57477792304', 'telefone'=>'9412222749', 'escolaridade'=>'Doutorado', 'especialiadade'=>'Direito administrativo'],
        ]);

        printf('Inserted %d documents', $insertVariosResultados->getInsertedCount());
    }



?>