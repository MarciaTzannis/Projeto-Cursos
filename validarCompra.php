<?php 
    // Variáveis
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["cpf"];
    $numeroCartao = $_REQUEST["numeroCartao"];
    $validadeCartao = $_REQUEST["validadeCartao"];
    $cvv = $_REQUEST["cvv"];
    $nomeCurso = $_REQUEST['nomeCurso'];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];

    // Funções
    // Validar o nome
    function validarNome($nome) {
        return strlen($nome) > 0 && strlen($nome) <= 50; // O nome tem que ter de 0 a 15 caracteres
    }
    // Validar CPF
    function validarCpf($cpf) {
        return strlen($cpf) == 11; // O CPF precisa ter 11 caracteres
    }

    // Validar Número do Cartão
    function validarNroCartao($validadeCartao) {
        $primeiraNum = substr($validadeCartao, 0, 1); // função que define como você quer validar 
        return $primeiraNum == 4 || $primeiraNum == 5 || $primeiraNum == 6;
        // opção: return substr($validadeCartao, 0, 1) == 4 && substr($validadeCartao, 0, 1) == 5 && substr($validadeCartao, 0, 1) == 6
    }
    
    // Validar se a data inserida é maior que a data atual
    function validarData($data) {
        $data_atual = date("Y-m");  // Data atual por ano e mês
        return $data >= $data_atual;
    }

    // Validar CVV
    function validarCvv($cvv) {
        return strlen($cvv) == 3; // O número do CVV deve ter 3 caracteres
    }

    //var_dump(validarNome($nome)); // imprime o tipo de retorno da função (true ou false)
    //var_dump(validarCpf($cpf));
    //var_dump(validarNroCartao($numeroCartao));
    //var_dump(validarData($validadeCartao));
    //var_dump(validarCvv($cvv));
    
    // Validar a compra
    

    function validarCompra($nome, $cpf, $numeroCartao, $data, $cvv) {
        global $erros; // Pegar a variável $erros e colocar dentro da minha função
        if (!validarNome($nome)) {
            array_push($erros, "Preencha seu nome"); // Vai colocar o erro dentro da variável $erros
        }
         
        if (!validarCpf($cpf)) {
            array_push($erros, "Preencha seu CPF");
        }    

        if (!validarCpf($cpf)) {
            array_push($erros, "Seu CPF precisa ter 11 caracteres");
        }
        
        if (!validarNroCartao($validadeCartao)) {
            array_push($erros, "Seu cartão precisa começar com 4, 5 ou 6");
        }

        if (!validarData($data)) {
            array_push($erros, "A validade precisa ser maior que a data atual");
        }
    
        if (!validarCvv($cvv)) {
            array_push($erros, "Seu CVV precisa ter 3 caracteres");
        }

    }
    validarCompra($nome, $cpf, $numeroCartao, $validadeCartao, $cvv);
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <?php if(count($erros) > 0) : ?> <!-- Div se tiver Erros -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span>Preencha seus dados corretamente!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php foreach ($erros as $chave => $valorErro) : ?>
                                <li class="list-group-item">     
                                    <?= $valorErro; ?>
                                </li>
                            <?php endforeach; ?>    
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php else : ?> <!-- Se não tiver erros -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span>Compra realizada com sucesso!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nome Curso: </strong> <?php echo $nomeCurso; ?> </li>
                            <li class="list-group-item"><strong>Preço: R$ </strong> <?php echo $precoCurso; ?> </li>
                            <li class="list-group-item"><strong>Nome Completo: </strong> <?php echo $nome; ?></li>
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>