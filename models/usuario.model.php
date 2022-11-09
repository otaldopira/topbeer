<?php

     class Usuario{     
          
          private $id;
          private $nome; 
          private $sobrenome; 
          private $CPF; 
          private $celular; 
          private $email; 
          private $senha;
          private $bebumCoins;
          private $nivelAutorizacao;

          public function create(){

               $bd = Conexao::get();
               $query = $bd->prepare("INSERT INTO usuarios (nome, sobrenome, CPF, celular, email, senha, bebumCoins, nivelAutorizacao) VALUES (:nome, :sobrenome, :CPF, :celular, :email, :senha, :bebumCoins, :nivelAutorizacao);");
               $query->bindParam(":nome", $this->nome);
               $query->bindParam(":sobrenome", $this->sobrenome);
               $query->bindParam(":CPF", $this->CPF);
               $query->bindParam(":celular", $this->celular);
               $query->bindParam(":email", $this->email);
               $query->bindParam(":senha", $this->senha);
               $query->bindParam(":bebumCoins", $this->bebumCoins);
               $query->bindParam(":nivelAutorizacao", $this->nivelAutorizacao);
               $query->execute();

               header('Location: /login');
          }

          public function list(){

               $bd = Conexao::get();
               $query = $bd->prepare("SELECT * FROM usuarios;");
               $query->execute();
               
               $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
               return $usuarios;
               
          }

          public function delete(){

               $bd = Conexao::get();
               $query = $bd->prepare("DELETE FROM usuarios WHERE id = :id");
               $query->bindParam(":id", $this->id);
               $query->execute();

               header('Location: /listar');

          }

          public function fetchOne(){
               $bd = Conexao::get();
               $query = $bd->prepare("SELECT * FROM usuarios WHERE id = :id");
               $query->bindParam(":id", $this->id);
               $query->execute();

               $fetchOne = $query->fetch(PDO::FETCH_OBJ);
               return $fetchOne;
          }

          public function edit(){
               $bd = Conexao::get();
               $query = $bd->prepare("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, CPF = :CPF, celular = :celular, email = :email, senha = :senha, bebumCoins = :bebumCoins, nivelAutorizacao = :nivelAutorizacao WHERE id = :id");
               $query->bindParam(":id", $this->id);
               $query->bindParam(":nome", $this->nome);
               $query->bindParam(":sobrenome", $this->sobrenome);
               $query->bindParam(":CPF", $this->CPF);
               $query->bindParam(":celular", $this->celular);
               $query->bindParam(":email", $this->email);
               $query->bindParam(":senha", $this->senha);
               $query->bindParam(":bebumCoins", $this->bebumCoins);
               $query->bindParam(":nivelAutorizacao", $this->nivelAutorizacao);
               $query->execute();

               header('Location: /listar');
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