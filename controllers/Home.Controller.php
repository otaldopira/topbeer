<?php

    class HomeController{

        public function index(){
            require_once('views/home.view.php');
        }

        public function login(){
            require_once('views/login.view.php');
        }

        public function cadastrar(){
            require_once('views/cadastro.usuario.view.php');
        }

        public function parceiros(){
            require_once('views/cadastro.parceiros.view.php');
        }

        public function listar(){
            
            $usuarios = new Usuario();
            $parceiros = new Parceiro();
            
            $resultUser = $usuarios->list();
            $resultParceiros = $parceiros->list();

            require_once('views/listar.view.php');
        }

    }