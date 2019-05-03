<?php
    $dsn = 'mysql:host=localhost;dbname=projeto_cursos;charset=utf8mb4;port:3306';
    $db_user = 'root'; // usuário
    $db_pass = 'root'; // senha
    $conexao  = new PDO($dsn, $db_user, $db_pass); // Abre a conexão


    // Criar uma variável para essa conexão, precisa de 3 informações (host/usuário/senha)
    // $conexao  = new PDO($dsn, $db_user, $db_pass);

    // var_dump($conexao);

    // Criar uma variável query: selecionando a tabela Usuários (interação com o Banco de Dados)
    // $query = $conexao->query('SELECT * FROM usuarios');





?>