<?php
    
    require ('layout/header.php');

    if(isset($_SESSION['logado'])){
        header('Location: /produtos');
    }

    if (isset($_SESSION['erro'])) {
        if ($_SESSION['erro']['count'] === 0) {
            $msnErro = $_SESSION['erro']['msn'];
            $_SESSION['erro']['count']++;
        } else {
            unset($_SESSION['erro']);
        }
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
            <?php if (isset($msnErro)) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro !',
                        text: '<?php echo $msnErro; ?>',
                    })
                </script>
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

