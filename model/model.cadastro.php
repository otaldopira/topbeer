<?php


$addUser = array("NOME" => "Eric", "SOBRENOME" => "Silva", "CPF" => "10536569983", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678");

$usuarios = array(
     array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "012345678910", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678"),
     array("NOME" => "Eric", "SOBRENOME" => "Silva", "CPF" => "10536569983", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678")
);

array_push($usuarios, $addUser);

echo "<pre>";
print_r($usuarios);
echo "</pre>";

function cadastrarUser()
{

     if (isset($_POST['submit'])) {

          $nomeUser = $_POST['nomeUser'];
          $sobrenomeUser = $_POST['sobrenomeUser'];
          $cpfUser = $_POST['cpfUser'];
          $celularUser = $_POST['celularUser'];
          $emailUser = $_POST['emailUser'];
          $senhaUser = $_POST['senhaUser'];

          var_dump($_POST['nomeUser']);

          if (!empty($nomeUser) && !empty($sobrenomeUser) && !empty($cpfUser) && !empty($celularUser) && !empty($emailUser) && !empty($senhaUser)) {

               if (!preg_match("/^[a-zA-Z-' ]*$/", $nomeUser)) {
                    die('Caractere indisponível !');
               }
          } else {
               die('Obrigatório preencher todos os campos!');
          }

          $usuarios = [
               'NOME' => "$nomeUser",
               'SOBRENOME' => "$sobrenomeUser",
               'CPF' => "$cpfUser",
               'CELULAR' => "$celularUser",
               'EMAIL' => "$emailUser",
               'SENHA' => "$senhaUser"
          ];

          echo "<pre>";
          print_r($usuarios);
          echo "</pre>";
     }
}
