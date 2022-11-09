<?php

class UsuarioController
{

    public function inserir()
    {

        $nome = filter_input(INPUT_POST, 'nomeUser', FILTER_SANITIZE_SPECIAL_CHARS);
        $sobrenome = filter_input(INPUT_POST, 'sobrenomeUser', FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = $_POST['cpfUser'];
        $celular = $_POST['celularUser'];
        $email = $_POST['emailUser'];
        $senha = $_POST['senhaUser'];
        $bebumCoins = isset($_POST['bebumCoinsUser']) ? $_POST['bebumCoinsUser'] : 5000;
        $nivel = isset($_POST['requisicao']) ? 1 : 0;

        $dados = ['$nome' => $nome, '$sobrenome' => $sobrenome , '$cpf' => $cpf, '$celular', '$senha' => $senha];

        if (!Validacao::validaCampoVazio($dados)) {
            session_start();
            $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!Validacao::validaCaracter($nome, $sobrenome)){
            session_start();
            $_SESSION['erro'] = ['msn' => "CARACTERES INDISPONÍVEIS !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!Validacao::validaCPF($cpf)){
            session_start();
            $_SESSION['erro'] = ['msn' => "CPF INVÁLIDO !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!Validacao::validaCelular($celular)){
            session_start();
            $_SESSION['erro'] = ['msn' => "NÚMERO DE CELULAR INVÁLIDO !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!Validacao::validaEmail($email)){
            session_start();
            $_SESSION['erro'] = ['msn' => "E-MAIL INVÁLIDO !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }
        if (!Validacao::validaSenha($senha)){
            session_start();
            $_SESSION['erro'] = ['msn' => "SENHA DEVE TER PELO MENOS 8 CARACTERES !", 'count'=> 0];
            header('Location: /usuario/cadastrar');
            exit();
        }

        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->sobrenome = $sobrenome;
        $usuario->CPF = $cpf;
        $usuario->celular = $celular;
        $usuario->email = $email;
        $usuario->senha = md5($senha);
        $usuario->bebumCoins = $bebumCoins;
        $usuario->nivelAutorizacao = $nivel;

        $usuario->create();

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
        $id = $_POST['idUs'];
        $nome = $_POST['nomeUser'];
        $sobrenome = $_POST['sobrenomeUser'];
        $cpf = $_POST['cpfUser'];
        $celular = $_POST['celularUser'];
        $email = $_POST['emailUser'];
        $senha = $_POST['senhaUser'];
        $bebumCoins = isset($_POST['bebumCoinsUser']) ? $_POST['bebumCoinsUser'] : 0;
        $nivel = isset($_POST['requisicao']) ? 1 : 0;

        $dados = ['$nome' => $nome, '$sobrenome' => $sobrenome , '$cpf' => $cpf, '$celular', '$senha' => $senha];
        
        if (!Validacao::validaCampoVazio($dados)) {
            session_start();
            $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }
        if (!Validacao::validaCaracter($nome, $sobrenome)){
            session_start();
            $_SESSION['erro'] = ['msn' => "CARACTERES INDISPONÍVEIS !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }
        if (!Validacao::validaCPF($cpf)){
            session_start();
            $_SESSION['erro'] = ['msn' => "CPF INVÁLIDO !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }
        if (!Validacao::validaCelular($celular)){
            session_start();
            $_SESSION['erro'] = ['msn' => "NÚMERO DE CELULAR INVÁLIDO !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }
        if (!Validacao::validaEmail($email)){
            session_start();
            $_SESSION['erro'] = ['msn' => "E-MAIL INVÁLIDO !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }
        if (!Validacao::validaSenha($senha)){
            session_start();
            $_SESSION['erro'] = ['msn' => "SENHA DEVE TER PELO MENOS 8 CARACTERES !", 'count'=> 0];
            header('Location: /listar');
            exit();
        }

        $usuario = new Usuario();
        $usuario->id = $id;
        $usuario->nome = $nome;
        $usuario->sobrenome = $sobrenome;   
        $usuario->CPF = $cpf;
        $usuario->celular = $celular;
        $usuario->email = $email;
        $usuario->senha = md5($senha);
        $usuario->bebumCoins = $bebumCoins;
        $usuario->nivelAutorizacao = $nivel;

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
