<?php

     $usuarios = array(
          array("NOME" => "ADM", "SOBRENOME" => "ADM", "CPF" => "10536569983", "CELULAR" => "42998143100", "EMAIL" => "ti@inovare.med.br", "SENHA" => "12345678", "BEBUMCOINS" => 50000, "REQUISICAO" => 'on'),
     );

     $produtos = array(
          array("NOME" => "CERVEJA LONGNECK", "MARCA" => "HEINKEN", "CATEGORIA" => "CERVEJA", "QUANTIDADE" => "5", "PRECO" => 12, "DESCRICAO" => "IMPORTADA", "FOTO" => 'HEINEKEN.PNG'),
     );

     function cadastraUsuario($nome, $sobrenome, $cpf, $celular, $email, $senha, $requisicao, $usuarios)
     {
          $addUser = array("NOME" => "$nome", "SOBRENOME" => "$sobrenome", "CPF" => "$cpf", "CELULAR" => "$celular", "EMAIL" => "$email", "SENHA" => "$senha", "BEBUMCOINS" => 50000, "REQUISICAO" => "$requisicao");

          array_push($usuarios, $addUser);

          echo "<pre>";
          print_r($usuarios);
          echo "</pre>";
     }

     function cadastraProduto($nome, $marca, $categoria, $quantidade, $preco, $descricao, $foto, $produtos){
          $addProduto = array("NOME" => "$nome", "MARCA" => "$marca", "CATEGORIA" => "$categoria", "QUANTIDADE" => "$quantidade", "PRECO" => "$preco", "DESCRICAO" => "$descricao", "FOTO" => $foto);

          array_push($produtos, $addProduto);

          echo "<pre>";
          print_r($produtos);
          echo "</pre>";
     }
