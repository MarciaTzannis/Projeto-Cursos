<?php 
    require "req/funcoesLogin.php";
    include "inc/head.php";

    // Verifica se o usuário enviou o formulário ou não
    if ($_REQUEST) {
        // pegando os valores dos inputs
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        // verificando se o usuário está logado através da função
        $estaLogado = logarUsuario($email, $senha);

        if ($estaLogado == true) {
            // a função header direciona para uma página, no caso, para o index.php
            header("Location: index.php");
        // se ele não está logado
        } else {
            $erro = "Seu usuário não foi encontrado!";
        }
    }
?>

<div class="page-center">
    <h2>Login</h2>
    <!-- Mostra a mensagem de erro caso a variável $erro esteja definida -->
    <?php if(isset($erro)) : ?>
    <div class="alert alert-danger">
        <span><?php echo $erro; ?></span>
    </div>
    <?php endif; ?>
    <form action="login.php" method="post" class="col-md-7">
        <div class="col-md-12">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">
        </div>
        <div class="col-md-12">
            <br>
            <button class="btn btn-primary" type="submit">Entrar</button>
            <a href="cadastro.php" class="col-md-offset-9">Fazer Cadastro!</a>
        </div>
    </form>
</div>


<?php 
    include "inc/footer.php";
?>