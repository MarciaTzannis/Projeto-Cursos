<?php 
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
        
        if (!validarNroCartao($numeroCartao)) {
            array_push($erros, "Seu cartão precisa começar com 4, 5 ou 6");
        }

        if (!validarData($data)) {
            array_push($erros, "A validade precisa ser maior que a data atual");
        }
    
        if (!validarCvv($cvv)) {
            array_push($erros, "Seu CVV precisa ter 3 caracteres");
        }

    }
?>