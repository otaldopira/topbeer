<?php

    require ('models/login.model.php');

    class LoginController{

        private $cpf;
        private $senha;

        public function entrar(){

            $loginUser = new Login();

            $loginUser->CPF = $_POST['cpfUser'];
            $loginUser->senha = $_POST['passUs'];
            
            $loginUser->buscarUsuario();
        }
    }


    // function validaCampoVazio($cpf, $senha){
    //     if(!empty($cpf) && !empty($senha)){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // function validaLogin(){
    //     session_start();
    //     if(isset($_SESSION['logado'])){
    //         header('Location: ../view/produtos.view.php');
    //     }

    // }

    // class Login{

    //     private $cpfUsuario;
    //     private $senhaUsuario;

    //     public function entrar(){
            
    //     }
    // }

    // validaLogin();

    // if(validaCampoVazio($cpfUser, $senhaUser) != 1)
    //     $msn = 'Preencha todos os campos !';
    // else
    //     if(fazerLogin($usuarios ,$cpfUser, $senhaUser) != 1)
    //         $msn = 'Login inválido !';
    //     else
    //         $msn = 'Login feito com sucesso !';

    // require('../view/login.view.php');
    