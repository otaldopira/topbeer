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
    
    if (isset($_SESSION['erro'])) {
        if ($_SESSION['erro']['count'] === 0) {
            $msnErro = $_SESSION['erro']['msn'];
            $_SESSION['erro']['count']++;
        } else {
            unset($_SESSION['erro']);
        }
    }
    
    if (isset($_SESSION['sucesso'])) {
        if ($_SESSION['sucesso']['count'] === 0) {
            $msnSucesso = $_SESSION['sucesso']['msn'];
            $_SESSION['sucesso']['count']++;
        } else {
            unset($_SESSION['sucesso']);
        }
    }

?>

<section class="register" id="register">

    <h1 class="heading"> <span>CADASTRO DE PRODUTOS</span> </h1>

    <div class="login">

        <form enctype="multipart/form-data" method="POST" action="/produto/inserir">
            <input type="text" placeholder="nome" class="box" name="nomeProd">
            <input type="text" placeholder="marca" class="box" name="marcaProd">
            <select class="box" name="categoriaProd">
                <option selected hidden>categoria</option>
                <option value="Cerveja">Cerveja</option>
                <option value="Vinho">Vinho</option>
                <option value="Whisky">Whisky</option>
            </select>
            <input type="number" placeholder="quantidade" class="box" name="quantProd">
            <input type="number" placeholder="preço" class="box" name="precoProd">
            <textarea class="box" placeholder="descrição" cols="10" rows="5" name="descricaoProd"></textarea>
            <input name="fotoProd" type="file" class="box">
            <label>*PNG, JPG, JPEG.</label><br>

            <div class="form-btn">
                <input type="submit" name="submit" value="Cadastrar" class="btn">
                <input type="reset" value="Limpar" class="btn">
            </div>

            <?php if (isset($msnSucesso)) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '<?php echo $msnSucesso ?>',
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

<?php

require_once('layout/footer.php');

?>