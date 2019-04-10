<?php
    include "inc/head.php";
    include "inc/header.php";

    // Array Associativo
    $cursos = [
        "Full Stack" => ["Curso de desenvolvimento web", 1000.99, "full.jpeg", "fullstack"],
        "Marketing Digital" => ["Curso de Marketing", 1000.98, "marketing.jpg", "marketing"],
        "UX" => ["Curso de User Experience", 9000.98, "ux.png", "ux"],
        "Mobile Android" => ["Curso de apps", 1000.97, "android.jpeg", "android"],
    ];
?>


    

    <div class="container">
        <div class="row">
            <!-- Para criar cursos -->
            <?php foreach ($cursos as $nomeCurso => $infoCurso) : ?>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail">
                    <!-- imagem curso -->
                    <img src="<?php echo "assets/img/$infoCurso[2]"; ?>" alt="<?php echo "Foto curso $nomeCurso"; ?>">
                    <div class="caption">
                        <h3><?php echo $nomeCurso; ?></h3>
                        <!-- descrição curso -->
                        <p><?php echo $infoCurso[0]; ?></p>
                        <!-- valor curso -->
                        <p><?php echo $infoCurso[1]; ?></p>
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="<?php echo "#$infoCurso[3]" ?>" role="button">Comprar</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php foreach ($cursos as $nomeCurso => $infoCurso) : ?>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $infoCurso[3]; ?>" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Preencha os seus dados</h4>
                        </div>
                        <div class="modal-body">
                            <h4> Curso de: <?php echo $nomeCurso ?> </h4>
                            <h4> Preço R$ <?php echo $infoCurso[1]; ?> </h4>
                            <form action="validarCompra.php" method="post">
                                <!-- input hidden para esconder valores-->
                                <input type="hidden" name="nomeCurso" value="<?php echo $nomeCurso; ?>"> 
                                <input type="hidden" name="precoCurso" value="<?php echo $infoCurso[1]; ?>">
                                <div class="input-group col-md-5">
                                    <label for="nomeCompleto">Nome Completo</label>
                                    <input id="nomeCompleto" name="nomeCompleto" type="text" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="cpf">CPF</label>
                                    <input id="cpf" name="cpf" type="number" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="numeroCartao">Número do Cartão</label>
                                    <input id="numeroCartao" name="numeroCartao" type="number" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="validadeCartao">Validade do Cartão</label>
                                    <input id="validadeCartao" name="validadeCartao" type="month" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="cvv">CVV</label>
                                    <input id="cvv" name="cvv" type="number" class="form-control">
                                </div>
                                <button class="btn btn-primary" type="submit">Comprar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>

<?php 
include "inc/footer.php";
?>