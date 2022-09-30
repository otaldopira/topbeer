<?php   

    require('../model/cadastro.model.php');

    $nomeUser = $_POST['nomeUser'];
    $sobrenomeUser = $_POST['sobrenomeUser'];
    $cpfUser = $_POST['cpfUser'];
    $celularUser = $_POST['celularUser'];
    $emailUser = $_POST['emailUser'];
    $senhaUser = $_POST['senhaUser'];

    if (isset($_POST['submit'])) {

    function validaCampoVazio($nome, $sobrenome, $cpf, $celular, $email, $senha){
        if (!empty($nome) && !empty($sobrenome) && !empty($cpf) && !empty($celular) && !empty($email) && !empty($senha)){
            return true;
        }
        return false;
    }

    function validaNomeSobrenome($nome, $sobrenome){
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
            return false;
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/", $sobrenome)) {
            return false;
        }

        return true;
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

    function validaCelular($telefone){
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

    function validaSenha($senha){
        if(strlen($senha) < 8){
            return false;
        }
        return true;
    }


    if(validaCampoVazio($nomeUser, $sobrenomeUser, $cpfUser, $celularUser, $emailUser, $senhaUser) != 1)
        $msn = 'Obrigatório preencher todos os campos !'; 
    else
        if(validaNomeSobrenome($nomeUser, $sobrenomeUser) != 1)
            $msn = 'Não é possível utilizar caracteres especiais !';
        else
            if(validaCpf($cpfUser) != 1)
                $msn = 'CPF inválido !';
            else
                if(validaCelular($celularUser) != 1)
                    $msn = 'Número inválido !';
                else
                    if(validaEmail($emailUser) != 1)
                        $msn = 'E-mail inválido !';
                    else
                        if(validaSenha($senhaUser) != 1)
                            $msn = 'Senha deve ter no mínimo 8 caracteres !';
                        else
                            cadastraUsuario($nomeUser, $sobrenomeUser, $cpfUser, $celularUser, $emailUser, $senhaUser);


    require('../view/cadastro.usuario.view.php');

}