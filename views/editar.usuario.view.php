<?php
include('layout/header.php');

?>
<section class="register" id="register">

    <h1 class="heading"> <span> Atualizar dados </span> </h1>

    <div class="row">

        <form action="/usuario/atualizar" method="POST">
            <input type="hidden" name="idUs" value="<?php echo $fetchOne->id ?>">
            <input type="text" placeholder="nome" id="nameUs" class="box" name="nomeUser" value="<?php echo $fetchOne->nome ?>">
            <input type="text" placeholder="sobrenome" id="lastNameUs" class="box" name="sobrenomeUser" value="<?php echo $fetchOne->sobrenome ?>" >
            <input type="text" placeholder="CPF" id="cpfUs" class="box" name="cpfUser" value="<?php echo $fetchOne->CPF ?>">
            <input type="text" placeholder="celular" id="telUs" class="box" name="celularUser" value="<?php echo $fetchOne->celular ?>">
            <input type="email" placeholder="e-mail" id="emailUs" class="box" name="emailUser" value="<?php echo $fetchOne->email ?>">
            <input type="password" placeholder="senha" id="passUs" class="box" name="senhaUser">
            <?php if(isset($_SESSION['nivelUser'])): ?>
                <?php if($_SESSION['nivelUser'] == '1'): ?>
                    <label>ADM:<input type="checkbox" value="1" name="requisicao"></label>
                <?php endif; ?>
            <?php endif; ?>
            <div class="form-btn">
                <input type="submit" value="Atualizar" class="btn" name="submit">
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
    <script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
    <script>        
        $(document).ready(function(){
            //Máscara CPF
            $('#cpfUs').mask('000.000.000-00');
            //Máscara celular
            $('#telUs').mask('(00)00000-0000');
        });
    </script>
<?php
include('layout/footer.php');
?>