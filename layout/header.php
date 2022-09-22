<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript" src="../js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
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
    <!-- Cabeçalho  -->

<header>

    <a href="#" class="logo">Top Beer<span>.</span></a>

    <nav class="navbar">
        <a href="index.html">início</a>
        <a href="products.html">produtos</a>
        <a href="register.html">cadastro</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
    </div>

</header>

<!-- Fim cabeçalho  -->