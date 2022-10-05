<?php

    require('../model/login.model.php');
    require('../model/cadastro.model.php');

    $cpfUser = $_POST['cpfUser'];
    $senhaUser = $_POST['passUs'];

    function validaCampoVazio($cpf, $senha){
        if(!empty($cpf) && !empty($senha)){
            return true;
        }else{
            return false;
        }
    }

    function validaLogin(){
        session_start();
        if(isset($_SESSION['logado'])){
            header('Location: ../view/produtos.view.php');
        }

    }

    validaLogin();

    if(validaCampoVazio($cpfUser, $senhaUser) != 1)
        $msn = 'Preencha todos os campos !';
    else
        if(fazerLogin($usuarios ,$cpfUser, $senhaUser) != 1)
            $msn = 'Login inválido !';
        else
            $msn = 'Login feito com sucesso !';

    require('../view/login.view.php');
    