<?php

    class Parceiro{

        private $id;
        private $razaoSocial;
        private $nomeFantasia;
        private $CNPJ;
        private $telefone;
        private $email;

        public function create(){

            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO parceiros (razaoSocial, nomeFantasia, CNPJ, telefone, email) VALUES (:razaoSocial, :nomeFantasia, :CNPJ, :telefone, :email);");
            $query->bindParam(":razaoSocial", $this->razaoSocial);
            $query->bindParam(":nomeFantasia", $this->nomeFantasia);
            $query->bindParam(":CNPJ", $this->CNPJ);
            $query->bindParam(":telefone", $this->telefone);
            $query->bindParam(":email", $this->email);
            $query->execute();

            session_start();
            $_SESSION['sucesso'] = ['msn' => "PARCEIRO CADASTRADO COM SUCESSO !", 'count'=> 0];
            header('Location: /parceiro/cadastrar');
       }

        public function list(){

            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM parceiros;");
            $query->execute();
            
            $parceiros = $query->fetchAll(PDO::FETCH_OBJ);
            return $parceiros;
        
        }

        public function delete(){

            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM parceiros WHERE id = :id");
            $query->bindParam(':id', $this->id);
            $query->execute();

        }

        public function fetchOne(){

            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM parceiros WHERE id = :id");
            $query->bindParam(':id', $this->id);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function update(){

            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE parceiros SET razaoSocial = :razaoSocial, nomeFantasia = :nomeFantasia, CNPJ = :CNPJ, telefone = :telefone, email = :email WHERE id = :id");
            $query->bindParam(':id', $this->id);
            $query->bindParam(":razaoSocial", $this->razaoSocial);
            $query->bindParam(":nomeFantasia", $this->nomeFantasia);
            $query->bindParam(":CNPJ", $this->CNPJ);
            $query->bindParam(":telefone", $this->telefone);
            $query->bindParam(":email", $this->email);
            
            $query->execute();

            session_start();
          $_SESSION['sucesso'] = ['msn' => "PARCEIRO ATUALIZADO COM SUCESSO !", 'count' => 0];
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