<?php

    class HomeController{

        public function index(){

            require ('views/home.view.php');

        }

        public function login(){
            require ('views/login.view.php');
        }

        public function cadastrar(){
            require ('views/cadastro.usuario.view.php');
        }

    }