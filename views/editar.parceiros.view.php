<?php

    include('layout/header.php');
        
    if(!$_SESSION['logado']) {
        header('Location: /login');
        exit();    
    }
    if(isset($_SESSION['nivelUser']) != 1) {
        header('Location: /login');
        exit();
    }  

?>
<section class="register" id="register">

    <h1 class="heading"> <span> Parceiros </span> </h1>

    <div class="row">

        <form action="/cadastrarParceiro" method="POST">
            <input type="hidden" name="idPar" value="<?php echo $fetchOne->id ?>">
            <input type="text" placeholder="razão social" class="box" name="razaoSocial">
            <input type="text" placeholder="fantasia" class="box" name="fantasia">
            <input type="number" placeholder="CNPJ" class="box" name="cnpj">
            <input type="number" placeholder="telefone" class="box" name="telefone">
            <input type="email" placeholder="e-mail" class="box" name="emailEmp">
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
            <img src="../images/parceiro-img.jpg" alt="pessoas">
        </div>

    </div>

</section>
<?php
include('layout/footer.php');
?>