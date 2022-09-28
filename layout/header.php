<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopBeer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
    <!-- JQuery Mask -->
    <script>        
        $(document).ready(function(){
            //Máscara CPF
            $('#cpfUs').mask('000.000.000-00');
            //Máscara celular
            $('#telUs').mask('(00) 00000-0000');
        });
    </script>
</head>
<body>
    
<header>
    <a href="../view/home.view.phps" class="logo">Top Beer<span>.</span></a>
    <nav class="navbar">
        <a href="../view/home.view.php">início</a>
        <a href="../view/produtos.view.php">produtos</a>
        <a href="../view/cadastro.usuario.view.php">cadastro</a>
    </nav>

    <div class="icons">
        <a href="../view/login.view.php" class="fas fa-user"></a>
    </div>
</header>