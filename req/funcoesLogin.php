<?php 
    // definindo o nome do arquivo
    $nomeArquivo = "usuarios.json";

    function cadastrarUsuario($usuario) {
        // pegando a variável para dentro da função
        global $nomeArquivo;

        // pegando o conteúdo do arquivo usuarios.json
        $usuarioJson = file_get_contents($nomeArquivo);

        // transformando um json em um array associativo
        $arrayUsuarios = json_decode($usuarioJson, true);

        // adicionando um novo usuário para o array associativo
        array_push($arrayUsuarios["usuarios"], $usuario);

        // transformando um array em json
        $usuarioJson = json_encode($arrayUsuarios);

        // colocando o json de volta para o arquivo usuarios.json - retorna true ou false
        $cadastrou = file_put_contents($nomeArquivo, $usuarioJson);

        // retornando a resposta true ou false
        return $cadastrou;
    }

    // criar função para logar
    function logarUsuario($email, $senha) {

        // pegando a variável para dentro da função
        global $nomeArquivo;
        // criei uma variável logado porque ainda não estou logado = false
        $logado = false;
        // pegando o conteúdo do arquivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);

        // transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);

        // verificando se o usuário existe no arquivo usuarios.json
        foreach ($arrayUsuarios["usuarios"] as $chave => $valor) {

            // verificando se o email digitado é igual ao email do json 
            // verificando se o email digitado é igual a senha do json
            if ($valor["email"] == $email && password_verify($senha, $valor["senha"])) {
                $logado = true;
                break;
            }
        }
        return $logado;
    }
?>