<?php

class UsuarioController
{

    public function inserir()
    {

        $nome = $_POST['nomeUser'];
        $sobrenome = $_POST['sobrenomeUser'];
        $cpf = $_POST['cpfUser'];
        $celular = $_POST['celularUser'];
        $email = $_POST['emailUser'];
        $senha = $_POST['senhaUser'];
        $nivel = isset($_POST['requisicao']) ? 1 : 0;

        if (!validaCampoVazio($nome, $sobrenome, $cpf, $celular, $email, $senha)) {
            session_start();
            $_SESSION['erro'] = "PREENCHA TODOS OS CAMPOS !";
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!validaNomeSobrenome($nome, $sobrenome)){
            session_start();
            $_SESSION['erro'] = "CARACTERES INDISPONÍVEIS !";
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!validaCPF($cpf)){
            session_start();
            $_SESSION['erro'] = "CPF INVÁLIDO !";
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!validaCelular($celular)){
            session_start();
            $_SESSION['erro'] = "NÚMERO DE CELULAR INVÁLIDO !";
            header('Location: /usuario/cadastrar');
            exit();
        }


        // $usuario = new Usuario();

        // $usuario->nome = $nome;
        // $usuario->sobrenome = $sobrenome;
        // $usuario->CPF = $cpf;
        // $usuario->celular = $celular;
        // $usuario->email = $email;
        // $usuario->senha = md5($senha);
        // $usuario->bebumCoins = 5000;
        // $usuario->nivelAutorizacao = $nivel;

        // $usuario->create();

    }

    public function excluir()
    {

        $usuario = new Usuario();
        $usuario->id = $_GET['id'];
        $usuario->delete();
    }

    public function editar()
    {

        $usuario = new Usuario();
        $usuario->id = $_GET['id'];
        $fetchOne = $usuario->fetchOne();

        require "views/editar.usuario.view.php";
    }

    public function atualizar()
    {

        $usuario = new Usuario();
        $usuario->id = $_POST['idUs'];
        $usuario->nome = $_POST['nomeUser'];
        $usuario->sobrenome = $_POST['sobrenomeUser'];
        $usuario->CPF = $_POST['cpfUser'];
        $usuario->celular = $_POST['celularUser'];
        $usuario->email = $_POST['emailUser'];
        $usuario->senha = md5($_POST['senhaUser']);
        $usuario->nivelAutorizacao = isset($_POST['requisicao']) == 1 ? 1 : 0;

        $usuario->edit();
    }

    public function usuario()
    {
        $usuario = new Usuario();
        $usuario->id = $_SESSION['id'];
        $infUser = $usuario->fetchOne();
        $_SESSION['nome'] = $infUser->nome;
        $_SESSION['bebumCoins'] = $infUser->bebumCoins;
    }

}

function validaCampoVazio($nome, $sobrenome, $cpf, $celular, $email, $senha)
{
    if (!empty($nome) && !empty($sobrenome) && !empty($cpf) && !empty($celular) && !empty($email) && !empty($senha)) {
        return true;
    }
    
    return false;
}

function validaNomeSobrenome($nome, $sobrenome)
{
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $nome)) {
        return false;
    }
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $sobrenome)) {
        return false;
    }

    return true;
}

function validaCpf($cpfUser)
{
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

function validaCelular($telefone)
{
    $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

    $regexCel = '/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/';
    if (preg_match($regexCel, $telefone)) {
        return true;
    } else {
        return false;
    }
}

function validaEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function validaSenha($senha)
{
    if (strlen($senha) < 8) {
        return false;
    }
    return true;
}

// if (isset($_POST['submit'])) {
//     if(validaCampoVazio($nomeUser, $sobrenomeUser, $cpfUser, $celularUser, $emailUser, $senhaUser) != 1)
//         $msn = 'Obrigatório preencher todos os campos !';
//     else
//         if(validaNomeSobrenome($nomeUser, $sobrenomeUser) != 1)
//             $msn = 'Não é possível utilizar caracteres especiais !';
//         else
//             if(validaCpf($cpfUser) != 1)
//                 $msn = 'CPF inválido !';
//             else
//                 if(validaCelular($celularUser) != 1)
//                     $msn = 'Número inválido !';
//                 else
//                     if(validaEmail($emailUser) != 1)
//                         $msn = 'E-mail inválido !';
//                     else
//                         if(validaSenha($senhaUser) != 1)
//                             $msn = 'Senha deve ter no mínimo 8 caracteres !';
//                         else
//                             cadastraUsuario($nomeUser, $sobrenomeUser, $cpfUser, $celularUser, $emailUser, $senhaUser, $requesicao, $usuarios);