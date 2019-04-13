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
?>