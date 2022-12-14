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

    <h1 class="heading"> <span> Atualizar Parceiros </span> </h1>

    <div class="row">

        <form action="/parceiro/atualizar" method="POST">
            <input type="hidden" name="idPar" value="<?php echo $fetchOne->id ?>">
            <input type="text" placeholder="razão social" class="box" name="razaoSocial" value="<?php echo $fetchOne->razaoSocial ?>">
            <input type="text" placeholder="fantasia" class="box" name="fantasia" value="<?php echo $fetchOne->nomeFantasia ?>">
            <input type="text" placeholder="CNPJ" id="CNPJemp" class="box" name="cnpj" value="<?php echo $fetchOne->CNPJ ?>">
            <input type="text" placeholder="telefone" id="telEmp" class="box" name="telefone" value="<?php echo $fetchOne->telefone ?>">
            <input type="email" placeholder="e-mail" class="box" name="emailEmp" value="<?php echo $fetchOne->email ?>">
            <div class="form-btn">
                <input type="submit" value="Atualizar" class="btn" name="submit">
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

        <div class="image">
            <img src="/images/parceiro-img.jpg" alt="pessoas">
        </div>

    </div>

</section>
<script>
    $(document).ready(function() {
        //Máscara CPF
        $('#CNPJemp').mask('00.000.0000/0000-00');
        //Máscara celular
        $('#telEmp').mask('(00)0000-00009');
        $('#telEmp').blur(function(event) {
            if ($(this).val().length == 14) {
                $('#telEmp').mask('(00)00000-0009');
            } else {
                $('#telEmp').mask('(00)0000-00009');
            }
        });
    });
</script>
<?php
include('layout/footer.php');
?>