<?php

if (isset($_POST['submit'])) {

     $nomeUser = $_POST['nomeUser'];
     $sobrenomeUser = $_POST['sobrenomeUser'];
     $cpfUser = $_POST['cpfUser'];
     $celularUser = $_POST['celularUser'];
     $emailUser = $_POST['emailUser'];
     $senhaUser = $_POST['senhaUser'];
     $erro = 0;

     //VERIFICAR SE TODOS OS INPUTS ESTÃO PREENCHIDOS
     if (!empty($nomeUser) && !empty($sobrenomeUser) && !empty($cpfUser) && !empty($celularUser) && !empty($emailUser) && !empty($senhaUser)) {

          //Não deixa colocar carácter especial no nome.
          if (!preg_match("/^[a-zA-Z-' ]*$/", $nomeUser)) {
               $erro++;
               die('Caractere indisponível !');
          }
          //Não deixa colocar carácter especial no sobrenome.
          if (!preg_match("/^[a-zA-Z-' ]*$/", $sobrenomeUser)) {
               $erro++;
               die('Caractere indisponível !');
          }

          //TIRA A MÁSCARA DO CPF
          $cpfNoMask = preg_replace('/\D/', '', $cpfUser);

          if (strlen($cpfNoMask) != 11) {
               $erro++;
               die ('CPF FALTANDO DÍGITOS!');
          }

          $d1 = 0;
          $d2 = 0;

          //VALIDANDO OS DÍGITOS VERIFICADORES DO CPF
          if (preg_match('/(\d)\1{10}/', $cpfNoMask)) {
               $erro++;
               die("CPF INVÁLIDO!");
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
               echo ($cpf);
          } else {
               $erro++;
               die("CPF INVÁLIDO!");
          }

          //VALIDANDO E-MAIL
          if (!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
               $erro++;
               die("E-MAIL INVÁLIDO");
          }
     } else {
          $erro++;
          die('Obrigatório preencher todos os campos!');
     }

     if ($erro == 0) {
          $addUser = array("NOME" => "$nomeUser", "SOBRENOME" => "$sobrenomeUser", "CPF" => "$cpfUser", "CELULAR" => "$celularUser", "EMAIL" => "$emailUser", "SENHA" => "$senhaUser", "BEBUMCOINS" => 50000);

          $usuarios = array(
               array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "012345678910", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678", "BEBUMCOINS" => 50000),
          );

          array_push($usuarios, $addUser);

          echo "<pre>";
          print_r($usuarios);
          echo "</pre>";
     }
}
