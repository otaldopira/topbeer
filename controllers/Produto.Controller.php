<?php

    class ProdutoController{

        public function inserir(){
            $produto = new Produto();
            $produto->nome = $_POST['nomeProd'];
            $produto->marca = $_POST['marcaProd'];
            $produto->categoria = $_POST['categoriaProd'];
            $produto->quantidade = $_POST['quantProd'];
            $produto->preco = $_POST['precoProd'];
            $produto->descricao = $_POST['descricaoProd'];
            $produto->imagem = $_FILES['fotoProd']['tmp_name'] ?? null;

            $produto->create();
        }

    
    }

  

    // $nomeProduto = $_POST['nomeProd'];
    // $marcaProduto = $_POST['marcaProd'];
    // $categoriaProduto = $_POST['categoriaProd'];
    // $quantidadeProduto = $_POST['quantProd'];
    // $precoProduto = $_POST['precoProd'];
    // $descricaoProduto = $_POST['descricaoProd'];
    // $fotoProduto = $_FILES['fotoProd']['tmp_name'];//$_POST['fotoProd'];
    

    // function validaCampoVazio($nome, $marca, $categoria, $quantidade, $preco, $descricao){
    //     if (!empty($nome) && !empty($marca) && !empty($categoria) && !empty($quantidade) && !empty($preco) && !empty($descricao)){
    //         return true;
    //     }
    //     return false;
    // }

    // function validaNomeMarca($nome, $marca){
    //     if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $nome)) {
    //         return false;
    //     }
    //     if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $marca)) {
    //         return false;
    //     }

    //     return true;
    // }

    // function validaQuantidade($quantidade){
    //     if($quantidade <= 0){
    //         return false;
    //     }
    //     return true;
    // }

    // function validaPreco($valor){
    //     if(preg_match("/^[1-9]\d{0,2}(\.\d{3})*,\d{2}$/", $valor)){
    //         return true;
    //     }else{
    //         return false;
    //     }    
    // }

    // function validaDescricao($descricao){
    //     if(strlen($descricao) > 5){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // if(validaCampoVazio($nomeProduto, $marcaProduto, $categoriaProduto, $quantidadeProduto, $precoProduto, $descricaoProduto) != 1)
    //     $msn = 'Obrigatório preencher todos os campos !'; 
    // else
    //     if(validaNomeMarca($nomeProduto, $marcaProduto) != 1)
    //         $msn = 'Não é possível utilizar caracteres especiais !';
    //     else
    //         if(validaQuantidade($quantidadeProduto) != 1)
    //             $msn = 'Quantidade deve ser maior do que 0 !';
    //         else
    //             if(validaPreco($precoProduto) != 1)
    //                 $msn = 'Preço inválido !';
    //             else
    //                 if(validaDescricao($descricaoProduto) != 1)
    //                     $msn = 'Descrição deve ter pelo menos 5 caracteres !';
    //                 else
    //                     cadastraProduto($nomeProduto, $marcaProduto, $categoriaProduto, $quantidadeProduto, $precoProduto, $descricaoProduto, $fotoProduto, $produtos);

    // require('../view/cadastro.produto.view.php');