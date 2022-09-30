<?php

    $usuarios = array(
        array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "105.365.699-82", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "1234567", "BEBUMCOINS" => 50000),
        array("NOME" => "ERIC", "SOBRENOME" => "ADM", "CPF" => "105.365.699-83", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678", "BEBUMCOINS" => 50000),
    );

//$userCpf = $_POST['cpfUser'];
//$userPass = $_POST['passUs'];


    function fazerLogin($usuarios, $cpf, $senha){
        session_start();
        foreach ($usuarios as $id => $user) {
            if($user['CPF'] == $cpf && $user['SENHA'] == $senha) {
                $_SESSION['logado'] = true;
                $_SESSION['cpf'] = $user['CPF'];
                $_SESSION['nome'] = $user['NOME'];
            }
            
        }
    }
    

