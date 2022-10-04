<?php

require('../layout/header.php');
require('../model/cadastro.model.php');

?>

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
        <div class="prod-row">
        
            <div class="col-md-6">
                <div class="image">
                    <img src="../images/p1.jpg" alt="cerveja">
                </div>
            </div>
            <div class="col-md-6">
                <h3>CERVEJA HEINKEN GARRAFA 600ML</h3>
                <p class="preco">BC$ 11</p>
                <p>Criada há quase 140 anos na Holanda, a Heineken é uma das cervejas mais famosas e mais vendidas do mundo. Com fórmula que é referência de cerveja premium, é feita com o mais puro malte, lúpulo e água cristalina. Seu sabor é marcante, de espuma persistente e muita personalidade, a Heineken conquista cada vez mais fãs e apreciadores.</p>
                <hr>
                <?php if(isset($_SESSION['logado'])):?>
                    <button class="btn" id="resgateDesc"><p>Resgatar</p></button>
                <?php else: ?>
                    <a href="./login.view.php" class="btn" id="resgateDesc"><p>Resgatar</p></a>
                <?php endif; ?>
                
            </div>
        </div>
    </section>

</section>

<!-- Fim sessão produtos -->

<?php

require('../layout/footer.php');

?>