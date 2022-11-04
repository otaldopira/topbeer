<?php 
include 'layout/header.php';

if(isset($_SESSION['erro'])){
    //var_dump($_SESSION['erroPar']);
    if($_SESSION['erro']['count'] === 0){
        $msn = $_SESSION['erro']['msn'];
        $_SESSION['erro']['count']++;
    } else {
       unset($_SESSION['erro']);
    }
}

if(isset($_SESSION['sucesso'])){
    if($_SESSION['sucesso']['count'] === 0){
        $msn = $_SESSION['sucesso']['msn'];
        $_SESSION['sucesso']['count']++;
    } else {
       unset($_SESSION['sucesso']);
    }
}


?>

<section class="register" id="register">

    <h1 class="heading"> <span> cadastro </span> </h1>

    <div class="row">

        <form action="/usuario/inserir" method="POST">

            <input type="text" placeholder="nome" id="nameUs" class="box" name="nomeUser">
            <input type="text" placeholder="sobrenome" id="lastNameUs" class="box" name="sobrenomeUser">
            <input type="text" placeholder="CPF" id="cpfUs" class="box" name="cpfUser">
            <input type="text" placeholder="celular" id="telUs" class="box" name="celularUser">
            <input type="email" placeholder="e-mail" id="emailUs" class="box" name="emailUser">
            <input type="password" placeholder="senha" id="passUs" class="box" name="senhaUser">
            <?php if (isset($_SESSION['nivelUser'])): ?>
                <?php if ($_SESSION['nivelUser'] == '1'): ?>
                    <input type="number" placeholder="bebum coins" name="bebumCoinsUser" class="box">
                    <label>ADM:<input type="checkbox" value="1" name="requisicao"></label>
                <?php endif;?>
            <?php endif;?>
            <div class="form-btn">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
            </div>
            <?php if(isset($msn)):?>
                    <p><?php echo $msn ?></p>        
            <?php endif; ?>    
        </form>

        <div class="image">
            <img src="/images/contact-img.jpg" alt="pessoas_bebendo">
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
            $('#telUs').mask('(00)0000-00009');
            $('#telUs').blur(function(event) {
                if ($(this).val().length == 14) { 
                    $('#telUs').mask('(00)00000-0009');
                } else {
                    $('#telUs').mask('(00)0000-00009');
                }
            });
        });
    </script>
<?php include 'layout/footer.php';?>