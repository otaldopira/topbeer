<?php include('layout/header.php'); ?>

<?php if (isset($_SESSION['logado'])) : ?>
    <div class="modal hidden" id="modal">
        <div class="msn">
            <p>Você resgatou seu produto !</p>
            <button id="ok" class="btn">OK</button>
        </div>
    </div>
<?php endif; ?>

<section class="products" id="products">

    <h1 class="heading"><span>produtos</span> </h1>

    <section class="product">
        <div class="prod-row">
            <div class="image">
                <img src="<?php echo $produtoDescricao->imagem ?> " alt="produto">
            </div>
            <div class="col-md-6">
                <h3><?php echo $produtoDescricao->nome ?></h3>
                <p class="preco">BC <?php echo $produtoDescricao->preco ?></p>
                <p><?php echo $produtoDescricao->descricao ?></p>
                <hr>
                <?php if (isset($_SESSION['logado'])) : ?>
                    <a class="btn" id="resgateDesc" href="/carrinhos/adicionar/?adicionar=<?php echo $produto->id ?>">Resgate</a>
                <?php else : ?>
                    <a href="/login" class="btn" id="resgateDesc">
                        <p>Resgatar</p>
                    </a>
                <?php endif; ?>

            </div>
        </div>
    </section>

</section>

<?php require('layout/footer.php'); ?>