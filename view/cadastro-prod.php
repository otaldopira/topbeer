<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP BEER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
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

    <section class="register" id="register">

        <h1 class="heading"> <span> CADASTRO DE PRODUTOS </span> </h1>

        <div class="login">

            <form enctype="multipart/form-data" method="POST" action="../controller/controller.cadastro.produtos.php">
                <input type="text" placeholder="nome" class="box" name="nomeProd">
                <input type="text" placeholder="marca" class="box" name="marcaProd">
                <select class="box" name="categoriaProd" >
                    <option disabled selected hidden>categoria</option>
                    <option value="Cerveja">Cerveja</option>
                    <option value="Vinho">Vinho</option>
                    <option value="Whisky">Whisky</option>
                </select>  
                <input type="number" placeholder="quantidade" class="box" name="quantProd">
                <input type="text" placeholder="preço" class="box" name="precoProd">
                <textarea class="box" placeholder="descrição" cols="10" rows="5" name="descricaoProd"></textarea>
                <input name="foto-prod" type="file" class="box">
                <label>*PNG, JPG, JPEG.</label><br>
        
                <div class="form-btn">
                    <input type="submit" name="submit" value="Cadastrar" class="btn">
                    <input type="reset" value="Limpar" class="btn">
                </div>

            </form>

        </div>

    </section>

    <!-- Rodapé  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>acesso rápido</h3>
                <a href="index.html">início</a>
                <a href="products.html">produtos</a>
                <a href="#">cadastro</a>
            </div>

            <div class="box">
                <h3>extra</h3>
                <a href="#">entrar</a>
                <a href="#">carrinho</a>
            </div>

            <div class="box">
                <h3>localização</h3>
                <a href="#">Imbituva</a>
                <a href="#">Irati</a>
                <a href="#">Ponta Grossa</a>
            </div>

            <div class="box">
                <h3>contato</h3>
                <a href="#">+55 429974-6845</a>
                <a href="#">topbeer@gmail.com</a>
                <a href="#">imbituva, paraná - 84430-000</a>
                <img src="images/payment.png" alt="">
            </div>

        </div>

    </section>

    <!-- Fim sessão rodapé -->
</body>

</html>