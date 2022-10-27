<?php

    require('vendor/autoload.php');

    use Pecee\SimpleRouter\SimpleRouter as Router;

    //IR PARA NA TELA INCIAL
    Router::get('/', 'HomeController@index');

    //IR PARA NA TELA INCIAL
    Router::get('/home', 'HomeController@index');

    //IR PARA PÁGINA DE LOGIN
    Router::get('/login', 'HomeController@login');

    //CADASTRO DE USUÁRIOS
    Router::get('/cadastrar', 'HomeController@cadastrar');

    //IR PARA A TELA DE CADASTRO DE PARCEIROS
    Router::get('/parceiros', 'HomeController@parceiros');

    //CHAMAR MÉTODO PARA FAZER LOGIN
    Router::post('/entrar', 'LoginController@entrar');

    //CHAMAR MÉTODO PARA FAZER LOGOUT
    Router::get('/sair', 'LoginController@sair');

    //IR PARA PÁGINA DE LISTAR = USUÁRIOS/PARCEIROS/PRODUTOS
    Router::get('/listar', 'HomeController@listar');

    //EXCLUIR USUÁRIOS
    Router::get('/excluirUsuario', 'UsuarioController@excluir');

    //CHAMA O MÉTODO PARA VERIFICAR O ID DO USUÁRIO NO BANCO
    Router::get('/alterarUsuario', 'UsuarioController@alterar');

    //EDITAR AS INFORMAÇÕES DO USUÁRIO
    Router::post('/editarUsuario', 'UsuarioController@editar'); 

    //CADASTRAR USUÁRIO NO BANCO
    Router::post('/inserir', 'UsuarioController@inserir');
    
    //CHAMA O MÉTODO PARA CADASTRAR O PARCEIRO
    Router::post('/cadastrarParceiro', 'ParceiroController@cadastrarParceiro');
    
    //EXCLUIR PARCEIRO
    Router::get('/excluirParceiro', 'ParceiroController@excluirParceiro');

    Router::start();