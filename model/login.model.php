<?php

function fazerLogin($usuarios, $cpf, $senha){
    
    foreach ($usuarios as $id => $user) {
        echo $user['CPF'];
        if ($user['CPF'] == $cpf && $user['SENHA'] == $senha) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['cpf'] = $user['CPF'];
            $_SESSION['nome'] = $user['NOME'];
            $_SESSION['bebumCoins'] = $user['BEBUMCOINS'];
            $_SESSION['nivelUser'] = $user['REQUISICAO'];
            return true;
        } 
    }

    return false;
}
