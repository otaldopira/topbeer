<?php

    class HomeController{

        public function index(){
            require_once('views/home.view.php');
        }

        public function login(){
            require_once('views/login.view.php');
        }

        public function usuarios(){
            require_once('views/cadastro.usuario.view.php');
            
        }

        public function parceiros(){
            require_once('views/cadastro.parceiros.view.php');
        }

        public function produtos(){
            require_once('views/cadastro.produto.view.php');
        }

        public function catalogo(){
            $produtos = new Produto();
            $resultProduto = $produtos->list();
            require_once('views/produtos.view.php');
        }

        public function listar(){
            
            $usuarios = new Usuario();
            $parceiros = new Parceiro();
            $produtos = new Produto();

            $resultUser = $usuarios->list();
            $resultParceiros = $parceiros->list();
            $resultProdutos = $produtos->list();

            require_once('views/listar.view.php');
        }

        public function carrinho(){

            require_once('views/carrinho.view.php');
        }

    }