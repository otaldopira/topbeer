<?php

    require('vendor/autoload.php');
    

    use Pecee\SimpleRouter\SimpleRouter as Router;

    //IR PARA NA TELA INCIAL
    Router::get('/', 'HomeController@index');

    //IR PARA NA TELA INCIAL
    Router::get('/home', 'HomeController@index');

    //IR PARA PÁGINA DE LOGIN
    Router::get('/login', 'HomeController@login');

    //CHAMAR MÉTODO PARA FAZER LOGIN
    Router::post('/login/entrar', 'LoginController@entrar');

    //IR PARA A TELA DE CADASTRO DE USUÁRIOS
    Router::get('/usuario/cadastrar', 'HomeController@usuarios');

    //EXCLUIR USUÁRIOS
    Router::get('/usuario/excluir', 'UsuarioController@excluir');

    //IR PARA A TELA DE CADASTRO DE PARCEIROS
    Router::get('/parceiro/cadastrar', 'HomeController@parceiros');

    //CHAMAR MÉTODO PARA FAZER LOGOUT
    Router::get('/sair', 'LoginController@sair');

    //IR PARA PÁGINA DE LISTAR = USUÁRIOS/PARCEIROS/PRODUTOS
    Router::get('/listar', 'HomeController@listar');

    //CHAMA O MÉTODO PARA VERIFICAR O ID DO USUÁRIO NO BANCO + TELA EDITAR
    Router::get('/usuario/editar', 'UsuarioController@editar');

    //ATUALIZA OS DADOS DO USUARIO
    Router::post('/usuario/atualizar', 'UsuarioController@atualizar'); 

    //CADASTRAR USUÁRIO NO BANCO
    Router::post('/usuario/inserir', 'UsuarioController@inserir');
    
    //CHAMA O MÉTODO PARA CADASTRAR O PARCEIRO
    Router::post('/parceiro/inserir', 'ParceiroController@inserir');
    
    //EXCLUIR PARCEIRO
    Router::get('/parceiro/excluir', 'ParceiroController@excluir');

    //IR PARA PÁGINA DE EDITAR PARCEIRO 
    Router::get('/parceiro/editar', 'ParceiroController@editar');

    //ATUALIZAR DADOS DO PARCEIRO
    Router::post('/parceiro/atualizar', 'ParceiroController@atualizar');

    //IR PARA PÁGINA DE CADASTRO DE PRODUTOS
    Router::get('/produto/cadastrar', 'HomeController@produtos');

    //CADASTRA PRODUTO NO BANCO
    Router::post('/produto/inserir', 'ProdutoController@inserir');

    //IR PARA PÁGINA DE PRODUTOS
    Router::get('/produtos', 'HomeController@catalogo');

    //IR PARA PÁGINA DE PRODUTOS
    Router::get('/prod/{id}', 'ProdutoController@procurar');

    //IR PARA A PÁGINA DE EDITAR DADOS DO PRODUTO
    Router::get('/produto/editar', 'ProdutoController@editar');

    //EXCLUIR PRODUTO
    Router::get('/produto/excluir', 'ProdutoController@excluir');

    //ATUALIZAR DADOS DO PRODUTO
    Router::post('/produto/atualizar', 'ProdutoController@atualizar');

    

    Router::start();