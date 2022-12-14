<?php

class CarrinhoController
{

    public function adicionar()
    {
        $produtos = new Produto();
        $produtos->id = $_GET['adicionar'];
        $resultado = $produtos->search();
        if ($resultado != false) {
            session_start();
            if (!isset($_SESSION['carrinho']["$resultado->id"])) {
                $_SESSION['carrinho']["$resultado->id"] = ['nome' => "$resultado->nome", 'preco' => "$resultado->preco", 'quantidade' => 1, 'imagem' => "$resultado->imagem"];
            } else {
                $_SESSION['carrinho']["$resultado->id"]['quantidade'] += 1;
            }

            session_start();
            $_SESSION['sucesso'] = ['msn' => "PRODUTO ADICIONADO AO CARRINHO !", 'count' => 0];
            header('Location: /produtos');

        }
    }

    public function remover()
    {
        $id = $_GET['remover'];
        session_start();
        if (isset($_SESSION['carrinho'][$id])) {
            if ($_SESSION['carrinho'][$id]['quantidade'] > 0) {
                $_SESSION['carrinho'][$id]['quantidade'] -= 1;
            }
            if ($_SESSION['carrinho'][$id]['quantidade'] <= 0) {
                unset($_SESSION['carrinho'][$id]);
                unset($_SESSION['total']);
            }
            header('Location: /carrinho');
        } else if (!isset($_SESSION['carrinho']) || !isset($_SESSION['carrinho'][$id])){
            header('Location: /carrinho');
        }
    }

    public function comprar(){
        
        session_start();
        if (isset($_SESSION['carrinho'])){
            $compras = new Carrinho();
            $compras->buy();
        }else {
            header('Location: /home');
        }
        
        
    }

}
