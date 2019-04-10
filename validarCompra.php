<?php 
    include "inc/head.php";
    include "inc/header.php";
    require "inc/funcoes.php"; // Verifica se tem algum erro no arquivo funções, se tiver algum erro, ele para.

    // Variáveis
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["cpf"];
    $numeroCartao = $_REQUEST["numeroCartao"];
    $validadeCartao = $_REQUEST["validadeCartao"];
    $cvv = $_REQUEST["cvv"];
    $nomeCurso = $_REQUEST['nomeCurso'];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];

    
    validarCompra($nome, $cpf, $numeroCartao, $validadeCartao, $cvv);
    
    // array_push - Adiciona um elemento na última posição do array
    // array_pop - Tira o último elemento do array

?>

    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <!-- count: conta o número de elementos do meu array -->
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

<?php include "inc/footer.php"; ?>