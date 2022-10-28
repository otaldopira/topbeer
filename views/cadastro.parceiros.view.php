<?php

include('layout/header.php');

if (!$_SESSION['logado']) {
    header('Location: /login');
    exit();
}
if (isset($_SESSION['nivelUser']) != 1) {
    header('Location: /login');
    exit();
}

?>
<section class="register" id="register">

    <h1 class="heading"> <span> Parceiros </span> </h1>

    <div class="row">

        <form action="/parceiro/cadastrar" method="POST">
            <input type="text" placeholder="razão social" class="box" name="razaoSocial">
            <input type="text" placeholder="fantasia" class="box" name="fantasia">
            <input type="text" placeholder="CNPJ" id="CNPJemp" class="box" name="cnpj">
            <input type="text" placeholder="telefone" id="telEmp" class="box" name="telefone">
            <input type="email" placeholder="e-mail" class="box" name="emailEmp">
            <div class="form-btn">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
            </div>
            <?php if (isset($msn)) : ?>
                <?php if ($msn != 1) : ?>
                    <p><?php echo $msn ?></p>
                <?php elseif ($msn == 1) : ?>
                    <p><?php echo 'Cadastro efetuado com sucesso!' ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </form>

        <div class="image">
            <img src="../images/parceiro-img.jpg" alt="pessoas">
        </div>

    </div>
    <script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
    <script>
        $(document).ready(function() {
            //Máscara CPF
            $('#CNPJemp').mask('00.000.0000/0000-00');
            //Máscara celular
            $('#telEmp').mask('(00)0000-00009');
            $('#telEmp').blur(function(event) {
                if ($(this).val().length == 15) { 
                    $('#telEmp').mask('(00)00000-0009');
                } else {
                    $('#telEmp').mask('(00)0000-00009');
                }
            });
        });
    </script>

</section>
<?php
include('layout/footer.php');
?>