<?php require('layout/header.php'); ?>

<?php if(isset($_SESSION['logado'])):?>
    <div class="modal hidden" id="modal">
        <div class="msn">
            <p>Você resgatou seu produto !</p>
            <button id="ok" class="btn">OK</button>
        </div>
    </div>
<?php endif; ?>

<!-- Sessão produtos  -->

<section class="products" id="products">

    <h1 class="heading"><span>produtos</span> </h1>

    <?php if (isset($resultProduto)) : ?>
        <?php foreach ($resultProduto as $produto) : ?>
            <div class="box-container">
                <div class="box">
                    <div class="image">
                        <img width="300" height="50" src="<?php echo $produto->imagem ?>" alt="">

                        <div class="icons">
                            <?php if(isset($_SESSION['logado'])):?>
                                <a id="resgate" href="#" class="cart-btn">Resgatar</a>
                            <?php else: ?>
                                <a id="resgate" href="./login.view.php" class="cart-btn">Resgatar</a>
                            <?php endif; ?>
                            <a href="/produto/<?php echo $produto->id ?>" class="fas fa-share"></a>
                        </div>

                    </div>

                    <div class="content">
                        <h3><?php echo $produto->nome ?></h3>
                        <div class="price"><?php echo "BC$ " . $produto->preco ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</section>



<!-- Fim sessão produtos -->

<?php require('layout/footer.php'); ?>