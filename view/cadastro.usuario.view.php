<?php
include('../layout/header.php');
?>
<section class="register" id="register">

    <h1 class="heading"> <span> cadastro </span> </h1>

    <div class="row">

        <form action="../controller/cadastro.usuario.controller.php" method="POST">
            <input type="text" placeholder="nome" id="nameUs" class="box" name="nomeUser">
            <input type="text" placeholder="sobrenome" id="lastNameUs" class="box" name="sobrenomeUser">
            <input type="text" placeholder="CPF" id="cpfUs" class="box" name="cpfUser">
            <input type="tel" placeholder="celular" id="telUs" class="box" name="celularUser">
            <input type="email" placeholder="e-mail" id="emailUs" class="box" name="emailUser">
            <input type="password" placeholder="senha" id="passUs" class="box" name="senhaUser">
            <div class="form-btn">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
            </div>
            <?php if(isset($msn)):?>
                <?php if($msn != 1): ?>
                    <p><?php echo $msn ?></p>
                <?php elseif($msn == 1):?>
                    <p><?php echo 'Cadastro efetuado com sucesso!'?></p>
                <?php endif; ?>           
            <?php endif; ?>
        </form>

        <div class="image">
            <img src="../images/contact-img.jpg" alt="pessoas_bebendo">
        </div>

    </div>

</section>
<?php
include('../layout/footer.php');
?>