<?php


    if(isset($_POST['submit'])){

          $nomeUser = $_POST['nomeUser'];
          $sobrenomeUser = $_POST['sobrenomeUser'];
          $cpfUser = $_POST['cpfUser'];
          $celularUser = $_POST['celularUser'];
          $emailUser = $_POST['emailUser'];
          $senhaUser = $_POST['senhaUser'];

          var_dump($_POST['nomeUser']);

          if(!empty($nomeUser) && !empty($sobrenomeUser) && !empty($cpfUser) && !empty($celularUser) && !empty($emailUser) && !empty($senhaUser)){

               if(!preg_match("/^[a-zA-Z-' ]*$/", $nomeUser)){
                    die('Caractere indisponível !');
               }

               

          }else{
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

    }


    

    

    
