<?php

    require_once('layout/header.php');

    if(!$_SESSION['logado']) {
        header('Location: /login');
        exit();    
    }
    if($_SESSION['nivelUser'] != 1) {
        header('Location: /home');
        exit();
    }  

?>

<section class="register" id="register">

    <h1 class="heading"> <span> ATUALIZAR PRODUTO </span> </h1>

    <div class="login">

        <form enctype="multipart/form-data" method="POST" action="/produto/atualizar">
            <input type="hidden" name="idProd" value="<?php echo $prodRes->id ?>">
            <input type="text" placeholder="nome" class="box" name="nomeProd" value="<?php echo $prodRes->nome ?>" >
            <input type="text" placeholder="marca" class="box" name="marcaProd" value="<?php echo $prodRes->marca ?>">
            <select class="box" name="categoriaProd" value="<?php echo $prodRes->categoria ?>">
                <option selected hidden>categoria</option>
                <option value="Cerveja">Cerveja</option>
                <option value="Vinho">Vinho</option>
                <option value="Whisky">Whisky</option>
            </select>

            <input type="number" placeholder="quantidade" class="box" name="quantProd" value="<?php echo $prodRes->quantidade ?>">
            <input type="number" placeholder="preço" class="box" name="precoProd" value="<?php echo $prodRes->preco ?>">
            <textarea class="box" placeholder="descrição" cols="10" rows="5" name="descricaoProd" ><?php echo $prodRes->descricao ?></textarea>
            <input name="fotoProd" type="file" class="box" value="<?php echo $prodRes->imagem ?>">
            <label>*PNG, JPG, JPEG.</label><br>

            <div class="form-btn">
                <input type="submit" name="submit" value="ATUALIZAR" class="btn">
                <input type="reset" value="Limpar" class="btn">
            </div>

            <?php if (isset($msnSucesso)) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '<?php echo $msnSucesso; ?>',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            <?php elseif (isset($msnErro)) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro !',
                        text: '<?php echo $msnErro; ?>',
                    })
                </script>
            <?php endif; ?>

        </form>

    </div>

</section>

<?php require_once('layout/footer.php');?>