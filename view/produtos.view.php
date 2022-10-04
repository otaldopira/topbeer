<?php

require('../layout/header.php');
require('../model/cadastro.model.php');

?>

<div class="modal hidden" id="modal">
    <div class="msn">
        <p>Você resgatou seu produto !</p>
        <button id="ok" class="btn">OK</button>
    </div>
</div>

<!-- Sessão produtos  -->

<section class="products" id="products">

    <h1 class="heading"><span>produtos</span> </h1>

    <?php if (isset($produtos)) : ?>
        <?php foreach ($produtos as $id => $produto) : ?>
            <div class="box-container">
                <div class="box">
                    <div class="image">
                        <img src="<?php echo $produto['FOTO'] ?>" alt="">

                        <div class="icons">
                            <a id="resgate" href="#" class="cart-btn">Resgatar</a>
                            <a href="../view/descricao.view.php" class="fas fa-share"></a>
                        </div>

                    </div>

                    <div class="content">
                        <h3><?php echo $produto['NOME'] ?></h3>
                        <div class="price"><?php echo "BC$ " . $produto['PRECO'] ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</section>



<!-- Fim sessão produtos -->

<?php

require('../layout/footer.php');

?>