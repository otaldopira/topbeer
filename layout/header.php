<?php
    session_start();
    if(isset($_SESSION['logado']) || $_SESSION == true)
        $nome = $_SESSION['nome'] ?? null;
        $bebum = $_SESSION['bebumCoins'] ?? null;
        $nivel = $_SESSION['nivelUser'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopBeer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>  
<header>
    <a href="../view/home.view.php" class="logo">Top Beer<span>.</span></a>
    <nav class="navbar">
        <a href="../view/home.view.php">início</a>
        <a href="../view/produtos.view.php">produtos</a>
        <a href="../view/cadastro.usuario.view.php">cadastro</a>
    </nav>

    <div class="icons">
        <a href="../view/login.view.php" class="fas fa-user"></a>
        
        <?php if(!empty($nome)): ?>
            <?php if($nivel == "on"): ?>
                <span class="menu-trigger">
                    <i class="fas fa-cog"></i>
                    <ul class="menu-menu">
                        <li><a href="../view/cadastro.produto.view.php"> Cadastrar Produto</a></li>
                        <li><a href="../view/cadastro.parceiros.view.php">Cadastrar Parceiros</a></li>
                        <li><a href="../view/listar.view.php">Listar</a></li>
                    </ul>
                </span>
            <?php endif; ?>       
            <i><?php echo $nome ?></i>
            <i class="fas fa-wallet"><?php echo " " . $bebum ?></i>
            <a href="../controller/logout.controller.php">SAIR</a>
        <?php endif; ?>
    </div>
</header>