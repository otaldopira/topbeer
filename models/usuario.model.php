<?php

     require_once ('Conexao.php');

     class Usuario{     
          
          private $nome; 
          private $sobrenome; 
          private $CPF; 
          private $celular; 
          private $email; 
          private $senha;
          private $nivelAutorizacao;

          public function create(){

               $bd = Conexao::get();
               $query = $bd->prepare("INSERT INTO usuarios (nome, sobrenome, CPF, celular, email, senha, nivelAutorizacao) VALUES (:nome, :sobrenome, :CPF, :celular, :email, :senha, :nivelAutorizacao);");
               $query->bindParam(":nome", $this->nome);
               $query->bindParam(":sobrenome", $this->sobrenome);
               $query->bindParam(":CPF", $this->CPF);
               $query->bindParam(":celular", $this->celular);
               $query->bindParam(":email", $this->email);
               $query->bindParam(":senha", $this->senha);
               $query->bindParam(":nivelAutorizacao", $this->nivelAutorizacao);
   
               $query->execute();
          }

          public function list(){

               $bd = Conexao::get();
               $query = $bd->prepare("SELECT * FROM usuarios;");
               $query->execute();
               $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
               return $usuarios;
               
          }
          
          public function __get($name)
          {
               return $this->$name;
          }

          public function __set($name, $value)
          {
               $this->$name = $value;
          }

     }