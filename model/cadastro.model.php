<?php

function cadastraUsuario($nome, $sobrenome, $cpf, $celular, $email, $senha)
{
     $addUser = array("NOME" => "$nome", "SOBRENOME" => "$sobrenome", "CPF" => "$cpf", "CELULAR" => "$celular", "EMAIL" => "$email", "SENHA" => "$senha", "BEBUMCOINS" => 50000);

     $usuarios = array(
          array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "012345678910", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678", "BEBUMCOINS" => 50000),
     );

     array_push($usuarios, $addUser);

     echo "<pre>";
     print_r($usuarios);
     echo "</pre>";
}
