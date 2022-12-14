<?php require_once('layout/header.php'); ?>

<?php if (isset($_SESSION['logado'])) {

    if (isset($_SESSION['sucesso'])) {
        if ($_SESSION['sucesso']['count'] === 0) {
            $msnSucesso = $_SESSION['sucesso']['msn'];
            $_SESSION['sucesso']['count']++;
        } else {
            unset($_SESSION['sucesso']);
        }
    }
}
?>

<?php if (isset($msnSucesso)) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?php echo $msnSucesso ?>',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php endif; ?>


<!-- Sessão produtos  -->

<section class="products" id="products">

    <h1 class="heading"><span>produtos</span> </h1>

    <?php if (isset($resultProduto)) : ?>

        <div class="box-container">
            <?php foreach ($resultProduto as $produto) : ?>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo $produto->imagem ?>" alt="seta">
                        <div class="icons">
                            <?php if (isset($_SESSION['logado'])) : ?>
                                <a id="resgate" href="/carrinhos/adicionar/?adicionar=<?php echo $produto->id ?>" class="cart-btn">Resgatar</a>
                            <?php else : ?>
                                <a id="resgate" href="/login" class="cart-btn">Resgatar</a>
                            <?php endif; ?>
                            <a href="/prod/<?php echo $produto->id ?>" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo $produto->nome ?></h3>
                        <div class="price"><?php echo "BC " . $produto->preco ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

</section>


<!-- Fim sessão produtos -->

<?php require_once('layout/footer.php'); ?>