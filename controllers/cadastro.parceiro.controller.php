<?php

    require('../model/cadastro.model.php');

    $razao = $_POST['razaoSocial'];
    $fantasia = $_POST['fantasia'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['emailEmp'];

    function validaCampoVazio($razao, $fantasia, $cnpj, $telefone, $email){
        if (!empty($razao) && !empty($fantasia) && !empty($cnpj) && !empty($telefone) && !empty($email)){
            return true;
        }
        return false;
    }

    function validaRazaoFantasia($razao, $fantasia){
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $razao)) {
            return false;
        }
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $fantasia)) {
            return false;
        }

        return true;
    }

    function validaCnpj($cnpj){
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        
        if (strlen($cnpj) != 14)
            return false;

        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;	

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if($cnpj[13] == ($resto < 2 ? 0 : 11 - $resto)){
            return true;
        }else {
            return false;
        }
        
    }

    function validaTelefone($telefone){
        $telefone= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

        $regexCel = '/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/';
        if (preg_match($regexCel, $telefone)) {
            return true;
        }else{
            return false;
        }
    }

    function validaEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }


    if(validaCampoVazio($razao, $fantasia, $cnpj, $telefone, $email) != 1)
        $msn = 'Obrigatório preencher todos os campos !'; 
    else
        if(validaRazaoFantasia($razao, $fantasia) != 1)
            $msn = 'Não é possível utilizar caracter especial !'; 
        else
            if(validaCnpj($cnpj) != 1)
                $msn = 'CNPJ inválido';
            else
                if(validaTelefone($telefone) != 1)
                    $msn = 'Telefone inválido !';
                else
                    if(validaEmail($email) != 1)
                        $msn = 'E-mail inválido !';
                    else    
                        cadastraParceiro($razao, $fantasia, $cnpj, $telefone, $email, $empresas);
                            
    require('../view/cadastro.parceiros.view.php');
?>