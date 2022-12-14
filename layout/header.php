<?php
session_start();

if (isset($_SESSION['logado'])) {
    $inf = new UsuarioController();
    $inf->usuario();
    $nome = $_SESSION['nome'] ?? null;
    $bebum = $_SESSION['bebumCoins'] ?? null;
    $nivel = $_SESSION['nivelUser'] ?? null;
}

if (isset($_SESSION['carrinho'])) {
    $quant = array_column($_SESSION['carrinho'], 'quantidade');
    if (array_sum($quant) > 0)
        $contador = array_sum($quant);
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopBeer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <header>
        <a href="/home" class="logo">Top Beer<span>.</span></a>
        <nav class="navbar">
            <a href="/home">início</a>
            <a href="/produtos">produtos</a>
            <a href="/usuario/cadastrar">cadastro</a>
        </nav>

        <div class="icons">
            <a href="/login" class="fas fa-user"></a>

            <?php if (!empty($nome)) : ?>
                <?php if ($nivel == "1") : ?>
                    <span class="menu-trigger">
                        <i class="fas fa-cog"></i>
                        <ul class="menu-menu">
                            <li><a href="/produto/cadastrar"> Cadastrar Produto</a></li>
                            <li><a href="/parceiro/cadastrar">Cadastrar Parceiros</a></li>
                            <li><a href="/listar">Listar</a></li>
                        </ul>
                    </span>
                <?php endif; ?>
                <i><?php echo $nome ?></i>
                <i class="fas fa-wallet"><?php echo " " . $bebum ?></i>
                <a href="/carrinho" class="fas fa-shopping-cart"><?php if (isset($contador)) echo $contador  ?></a>
                <a href="/sair">SAIR</a>
            <?php endif; ?>
        </div>
    </header>