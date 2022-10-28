<?php
    
    require ('layout/header.php');

    if(isset($_SESSION['logado']) || $_SESSION == true){
        header('Location: ../view/produtos.view.php');
    }

    if(isset($_GET['erro'])){
        $msn = $_GET['erro'];
    }

?>

<section class="register" id="register">

    <h1 class="heading"> <span> LOGIN </span> </h1>

    <div class="login">

        <form action="/login/entrar" method="POST">
            <input type="text" placeholder="CPF" class="box" name="cpfUser" id="cpfUs">
            <input type="password" name="passUs" placeholder="senha" class="box">
            <div class="form-btn">
                <input type="submit" value="Entrar" class="btn" name="submit">
            </div>
            <?php if(isset($msn)):?>
                    <p><?php echo $msn ?></p>        
            <?php endif; ?>       
        </form>

    </div>

</section>

<script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
    <script>        
        $(document).ready(function(){
            //Máscara CPF
            $('#cpfUs').mask('000.000.000-00');
        });
    </script>

<?php
    
    require ('layout/footer.php');

?>

