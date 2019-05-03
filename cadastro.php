<?php 
    require "req/database.php";
    require "req/funcoesLogin.php";
    include "inc/head.php";

    // Validando se o formulário foi enviado
    if ($_REQUEST) {
        $nome = $_REQUEST["nome"]; // Outra opção: $_POST["nome];
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["confirmarSenha"];
        // Teste
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        // Testes md5
        //$cadastro = md5($senha);
        //$login = md5($senha);
        //echo $cadastro . "<br>"; // Compara o que foi cadastrado com o login
        //echo $login;
        //exit;

        // Imprimir na tela as informações do cadastro
        //echo $nome . " " . $email . " " . $senha . " " . $confirmarSenha;
        //exit;

        // verifica se a senha é igual ao confirmar senha
        if ($senha == $confirmarSenha) {
            // Criptografando a senha
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
            // Criando um novo usuário (o banco de dados com as informações do cadastro)
            $novoUsuario = [
                "nome" => $nome,
                "email" => $email,
                "senha" => $senhaCrip,
            ];

            // cadastro meu usuário no json
            $cadastrou = cadastrarUsuario($novoUsuario);
        } else {
            $erro = "Senhas incompatíveis";
        }

    }
?>
<!-- Formulário -->
<div class="page-center">
    <h2>Cadastre-se</h2>
    <!-- Verifica se a variável cadastrou esta definida -->
    <?php if(isset($cadastrou) && $cadastrou) : ?>
    <div class="alert alert-success" role="alert">
        <span>Usuário cadastrado com sucesso!</span>
    </div>
    <!-- Verifica se a variável erro foi definida -->
    <?php elseif (isset($erro)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erro ?>
    </div>
    <?php endif; ?>
    <form action="cadastro.php" method="post" class="col-md-7">
        <div class="col-md-12">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome">
        </div>
        <div class="col-md-12">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-md-12">
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">
        </div>
        <div class="col-md-12">
            <label for="inputConfirmarSenha">Confirme sua Senha</label>
            <input type="password" name="confirmarSenha" class="form-control" id="inputConfirmarSenha">
        </div>
        <div class="col-md-12">
            <br>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
            <a href="login.php" class="col-md-offset-9">Fazer Login!</a>
        </div>
    </form>
</div>

<?php 
    include "inc/footer.php";
?>