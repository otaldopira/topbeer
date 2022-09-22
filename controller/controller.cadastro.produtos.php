<?php  

    require("../conexao.php");

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// //die;
if (isset($_POST['submit'])) {
    // if (isset($_POST['categoriaProd'])) {
    //     print_r($_POST['categoriaProd']);
    // }
    // print_r($_POST['nomeProd']);
    // print_r($_POST['marcaProd']);
    // print_r($_POST['quantProd']);
    // print_r($_POST['precoProd']);
    // print_r($_POST['descricaoProd']);

    $nomeProd = $_POST['nomeProd'];
    $marcaProd = $_POST['marcaProd'];
    $categoriaProd = $_POST['categoriaProd'];
    $quantProd = $_POST['quantProd'];
    $precoProd = $_POST['precoProd'];
    $descricaoProd = $_POST['descricaoProd']; 

    //Verifica se foi feito o UPLOAD
    if (isset($_FILES['foto-prod'])) {

        //Recebendo o upload na variável
        $fotoProduto = $_FILES['foto-prod'];


        if ($fotoProduto['error']) {
            die("Falha ao enviar arquivo!");
        }

        //Local para armazenar a foto
        $local = "uploads/";

        //deixando a extensão da foto tudo em minúsculo.
        $extensaoFoto = strtolower(pathinfo($fotoProduto['name'], PATHINFO_EXTENSION));

        //Só aceita se for formato JPG e PNG.
        if ($extensaoFoto != "jpg" && $extensaoFoto != "png") {
            die('tipo de arquivo incompatível!');
        }

        //Recebendo o caminho da foto para onde a foto vai ser movida.
        $path = $local . $fotoProduto['name'];

        //Mover a foto 
        $moverImagem = move_uploaded_file($fotoProduto["tmp_name"], $path);
    }

    $query = ("INSERT INTO PRODUTOS(CATEGORIA, NOME_PRODUTO, MARCA_PRODUTO, QUANT_PRODUTO, PRECO_PRODUTO, DESC_PRODUTO, FOTO_PRODUTO) VALUES('$categoriaProd', '$nomeProd', '$marcaProd', $quantProd, $precoProd, '$descricaoProd', '$path')");

    mysqli_query($mysqli,  $query);
    //header("Location: ../index.php");
}
