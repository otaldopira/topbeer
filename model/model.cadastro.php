<?php

if (isset($_POST['submit'])) {

     $nomeUser = $_POST['nomeUser'];
     $sobrenomeUser = $_POST['sobrenomeUser'];
     $cpfUser = $_POST['cpfUser'];
     $celularUser = $_POST['celularUser'];
     $emailUser = $_POST['emailUser'];
     $senhaUser = $_POST['senhaUser'];

     var_dump($_POST['nomeUser']);

     if (!empty($nomeUser) && !empty($sobrenomeUser) && !empty($cpfUser) && !empty($celularUser) && !empty($emailUser) && !empty($senhaUser)) {

          //Não deixa colocar caracter especial no nome.
          if (!preg_match("/^[a-zA-Z-' ]*$/", $nomeUser)) {
               die('Caractere indisponível !');
          }
          //Não deixa colocar caracter especial no sobrenome.
          if (!preg_match("/^[a-zA-Z-' ]*$/", $sobrenomeUser)) {
               die('Caractere indisponível !');
          }

          $addUser = array("NOME" => "$nomeUser", "SOBRENOME" => "$sobrenomeUser", "CPF" => "$cpfUser", "CELULAR" => "$celularUser", "EMAIL" => "$emailUser", "SENHA" => "$senhaUser", "BEBUMCOINS" => 50000);

          $usuarios = array(
               array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "012345678910", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678", "BEBUMCOINS" => 50000),
          );

          array_push($usuarios, $addUser);

          echo "<pre>";
          print_r($usuarios);
          echo "</pre>";
     } else {

          die('Obrigatório preencher todos os campos!');
     }
}
