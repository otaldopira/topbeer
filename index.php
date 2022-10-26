<?php

    require('vendor/autoload.php');

    use Pecee\SimpleRouter\SimpleRouter as Router;

    Router::get('/', 'HomeController@index');
    Router::get('/home', 'HomeController@index');
    Router::get('/login', 'HomeController@login');
    Router::get('/cadastrar', 'HomeController@cadastrar');



    Router::post('/entrar', 'LoginController@entrar');
    Router::post('/inserir', 'UsuarioController@inserir');

    Router::start();