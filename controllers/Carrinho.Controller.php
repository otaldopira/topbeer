<?php 

    class CarrinhoController{

        public function adicionar(){
            $produtos = new Produto();
            $produtos->id = $_GET['adicionar'];
            $resultado = $produtos->search();
            if ($resultado != false){
                session_start();
                if(!isset($_SESSION['carrinho']["$resultado->id"])){
                    $_SESSION['carrinho']["$resultado->id"] = ['nome' => "$resultado->nome", 'preco' => "$resultado->preco", 'quantidade' => 1, 'imagem' => "$resultado->imagem"];
                } else {
                    $_SESSION['carrinho']["$resultado->id"]['quantidade'] += 1; 
                }
                header('Location: /produtos'); 
                 
            }            
        }

        public function remover(){
            $produtos = new Produto();
            $produtos->id = $_GET['adicionar'];
            $resultado = $produtos->search();
            print_r($resultado);
            if ($resultado != false){
                if(!isset($_SESSION['carrinho'])){
                    session_start();
                    $_SESSION['carrinho']["$resultado->id"] = ['nome' => "$resultado->nome", 'imagem' => "$resultado->imagem"];
                } else {
                    $_SESSION['carrinho']["$resultado->id"] = ['nome' => "$resultado->nome", 'imagem' => "$resultado->imagem"];
                } 
                
            }            
        }
    }