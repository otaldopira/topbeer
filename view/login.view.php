<?php
    
    require ('../layout/header.php');

    session_start();
    if(isset($_SESSION['logado']) || $_SESSION == true){
        header('Location: ../view/produtos.view.php');
    }

?>

<section class="register" id="register">

    <h1 class="heading"> <span> LOGIN </span> </h1>

    <div class="login">

        <form action="../controller/login.controller.php" method="POST">
            <input type="text" placeholder="CPF" class="box" name="cpfUser" id="cpfUs">
            <input type="password" name="passUs" placeholder="senha" class="box">
            <div class="form-btn">
                <input type="submit" value="Entrar" class="btn" name="submit">
            </div>
            <?php if(isset($msn)):?>
                <?php if($msn != 1): ?>
                    <p><?php echo $msn ?></p>
                <?php elseif($msn == 1):?>
                    <p><?php echo ''?></p>
                <?php endif; ?>           
            <?php endif; ?>       
        </form>

    </div>

</section>

<?php
    
    require ('../layout/footer.php');

?>

