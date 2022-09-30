<?php

    require('../model/login.model.php');

    $cpfUser = $_POST['cpfUser'];
    $senhaUser = $_POST['passUs'];

    function validaCampoVazio($cpf, $senha){
        if(!empty($cpf) && !empty($senha)){
            return true;
        }else{
            return false;
        }
    }

    function validaCpf($cpfUser){
        //TIRA A MÁSCARA DO CPF
        $cpfNoMask = preg_replace('/\D/', '', $cpfUser);

        if (strlen($cpfNoMask) != 11) {
            return false;
        }

        $d1 = 0;
        $d2 = 0;

        //VALIDANDO OS DÍGITOS VERIFICADORES DO CPF
        if (preg_match('/(\d)\1{10}/', $cpfNoMask)) {
            return false;
        }

        for ($i = 0, $x = 10; $i < 9; $i++, $x--) {
            $d1 += $cpfNoMask[$i] * $x;
        }

        for ($i = 0, $x = 11; $i < 10; $i++, $x--) {
            $d2 += $cpfNoMask[$i] * $x;
        }

        $tempD1 = (($d1 % 11) < 2) ? 0 : (11 - ($d1 % 11));
        $tempD2 = (($d2 % 11) < 2) ? 0 : (11 - ($d2 % 11));

        if ($tempD1 == $cpfNoMask[9] && $tempD2 == $cpfNoMask[10]) {
            return true;
        }
    }

    function validaSenha($senha){
        if(strlen($senha) < 8){
            return false;
        }

        return true;
    }

    function validaLogin(){
        session_start();
        if(isset($_SESSION['logado'])){
            header('Location: ../view/produtos.view.php');
        }

    }

    validaLogin();
    if(validaCampoVazio($cpfUser, $senhaUser) != 1)
        $msn = 'Obrigatório preencher todos os campos !'; 
    else
        if(validaCpf($cpfUser) != 1)
            $msn = 'CPF inválido !';
        else
            fazerLogin($usuarios, $cpfUser, $senhaUser);

    require('../view/login.view.php');
    