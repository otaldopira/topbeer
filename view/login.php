<?php
    
    require ('../layout/header.php');
?>

<section class="register" id="register">

    <h1 class="heading"> <span> LOGIN </span> </h1>

    <div class="login">

        <form action="../controller/controller.login.php" method="POST">
            <input type="text" placeholder="CPF" class="box" name="cpfUser" id="cpfUs">
            <input type="password" name="passUs" placeholder="senha" class="box">
            <div class="form-btn">
                <input type="submit" value="Entrar" class="btn" name="submit">
            </div>
            
        </form>

    </div>

</section>

<?php
    
    require ('../layout/footer.php');

?>

