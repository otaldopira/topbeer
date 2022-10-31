<?php include('layout/header.php'); ?>

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

    <section class="product">
        <?php 
            if(isset($produtoDescricao)):
                foreach ($produtoDescricao as $produto):
        ?>
                    <div class="prod-row">
                    
                        <div class="col-md-6">
                            <div class="image">
                                <img src="<?php echo $produto->imagem ?> " alt="produto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3><?php echo $produto->nome ?></h3>
                            <p class="preco">BC$ <?php echo $produto->preco ?></p>
                            <p><?php echo $produto->descricao ?></p>
                            <hr>
                            <?php if(isset($_SESSION['logado'])):?>
                                <button class="btn" id="resgateDesc"><p>Resgatar</p></button>
                            <?php else: ?>
                                <a href="/login" class="btn" id="resgateDesc"><p>Resgatar</p></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
        <?php
                endforeach;
            endif;
        ?>
    </section>

</section>

<!-- Fim sessão produtos -->

<?php require('layout/footer.php'); ?>