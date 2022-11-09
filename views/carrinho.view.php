<?php 
  require('layout/header.php');

  if(!$_SESSION['logado']) {
    header('Location: /login');
    exit();    
  }
  $totalUn = 0;
?>

<div class="checkout">
  <div class="items">
    <h2>PRODUTOS</h2>
      <?php
        if(isset($_SESSION['carrinho'])):
          $contagem = count($_SESSION['carrinho']);
          if($contagem > 0):
            foreach($_SESSION['carrinho'] as $id => $produto):
              $_SESSION['total'] = $totalUn += $produto['preco'] * $produto['quantidade'];    
      ?>
            <ul>
              <li>
                <img src="<?php echo $produto['imagem'] ?>" />
                <div class="dados">
                  <h4><?php echo $produto['nome'] ?></h4>
                  <span>Quantidade: <?php echo $produto['quantidade'] ?></span>
                  <small>BC <?php echo $produto['preco'] * $produto['quantidade']?></small>
                </div>
                <div class="controles">
                  <a class="btn" href="/carrinhos/remover/?remover=<?php echo $id ?>">remover</a>
                </div>
              </li>
            </ul>
      <?php
            endforeach;
          endif;
        endif;
      ?>
  </div>

  <div class="pagamento">
    <h2>PAGAMENTO</h2>
    <form method="POST" action="/comprar" class="pag">
      <input type="hidden" id="total" name="total" value="<?php echo $totalUn ?>" />
      <div class="total">
        <small>Total:</small>

        <h1>BC <?php echo isset($_SESSION['total']) ? $_SESSION['total'] : null; ?></h1>
      </div>
      <button>Pagar</button>
    </form>
  </div>
</div>

<?php require('layout/footer.php') ?>