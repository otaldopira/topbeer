<?php
    
    require ('../layout/header.php');
?>

    <!-- Sessão de cadastro de usuários  -->

<section class="register" id="register">

    <h1 class="heading"> <span> cadastro </span> </h1>

    <div class="row">

        <form action="../controller/controller.cadastro.php" method="POST">
            <input type="text" placeholder="nome" id="nameUs" class="box" name="nomeUser">
            <input type="text" placeholder="sobrenome" id="lastNameUs" class="box" name="sobrenomeUser">
            <input type="text" placeholder="CPF" id="cpfUs" class="box" name="cpfUser">
            <input type="tel" placeholder="celular" id="telUs" class="box" name="celularUser">
            <input type="email" placeholder="e-mail" id="emailUs" class="box" name="emailUser">
            <input type="password" placeholder="senha" id="passUs" class="box" name="senhaUser">
            <div class="form-btn">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
            </div>
            
        </form>

        <div class="image">
            <img src="../images/contact-img.jpg" alt="pessoas_bebendo">
        </div>

    </div>

</section>

<?php
    
    require ('../layout/footer.php');

?>