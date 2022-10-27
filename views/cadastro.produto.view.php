<?php


    include('../layout/header.php');
    session_start();
    if(!$_SESSION['logado']) {
        header('Location: ../view/login.view.php');
        exit();    
    }
    if($_SESSION['nivelUser'] != "1") {
        header('Location: ../view/produtos.view.php');
        exit();
    }  

?>

<section class="register" id="register">

    <h1 class="heading"> <span> CADASTRO DE PRODUTOS </span> </h1>

    <div class="login">

        <form enctype="multipart/form-data" method="POST" action="../controller/cadastro.produto.controller.php">
            <input type="text" placeholder="nome" class="box" name="nomeProd">
            <input type="text" placeholder="marca" class="box" name="marcaProd">
            <select class="box" name="categoriaProd">
                <option disabled selected hidden>categoria</option>
                <option value="Cerveja">Cerveja</option>
                <option value="Vinho">Vinho</option>
                <option value="Whisky">Whisky</option>
            </select>
            <input type="number" placeholder="quantidade" class="box" name="quantProd">
            <input type="text" placeholder="preço" class="box" name="precoProd">
            <textarea class="box" placeholder="descrição" cols="10" rows="5" name="descricaoProd"></textarea>
            <input name="fotoProd" type="file" class="box">
            <label>*PNG, JPG, JPEG.</label><br>

            <div class="form-btn">
                <input type="submit" name="submit" value="Cadastrar" class="btn">
                <input type="reset" value="Limpar" class="btn">
            </div>

            <?php if(isset($msn)):?>
                <?php if($msn != 1): ?>
                    <p><?php echo $msn ?></p>
                <?php elseif($msn == 1):?>
                    <p><?php echo 'Cadastro efetuado com sucesso!'?></p>
                <?php endif; ?>           
            <?php endif; ?>

        </form>

    </div>

</section>

<?php

include('../layout/footer.php');

?>