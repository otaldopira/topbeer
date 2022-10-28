<?php

    class Produto{

        private $id;
        private $nome;
        private $marca;
        private $categoria;
        private $quantidade;
        private $preco;
        private $descricao;
        private $imagem;

        public function create(){
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO produtos (nome, marca, categoria, quantidade, preco, descricao, imagem) VALUES (:nome, :marca, :categoria, :quantidade, :preco, :descricao, :imagem);");
            $query->bindParam(':nome', $this->nome);
            $query->bindParam(':marca', $this->marca);
            $query->bindParam(':categoria', $this->categoria);
            $query->bindParam(':quantidade', $this->quantidade);
            $query->bindParam(':preco', $this->preco);  
            $query->bindParam(':descricao', $this->descricao);
            $query->bindParam(':imagem', $this->imagem);
            $query->execute();

            header("Location: /listar");
        }

        public function list(){
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM produtos;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
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
