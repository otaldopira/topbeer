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

            session_start();
            $_SESSION['sucesso'] = ['msn' => "PRODUTO CADASTRADO COM SUCESSO !", 'count'=> 0];
            header("Location: /produto/cadastrar/");
        }

        public function list(){
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM produtos;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function search(){
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM produtos WHERE id = :id;");
            $query->bindParam(':id', $this->id);
            $query->execute();
            if($query->rowCount() == 0){
                header('Location: /carrinho');
                return false;
            }else {
                return $query->fetch(PDO::FETCH_OBJ);
            }  
        }

        public function update(){
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE produtos SET nome = :nome, marca = :marca, categoria = :categoria, quantidade = :quantidade, preco = :preco, descricao = :descricao, imagem = :imagem WHERE id = :id");

            $query->bindParam(':id', $this->id);
            $query->bindParam(':nome', $this->nome);
            $query->bindParam(':marca', $this->marca);
            $query->bindParam(':categoria', $this->categoria);
            $query->bindParam(':quantidade', $this->quantidade);
            $query->bindParam(':preco', $this->preco);  
            $query->bindParam(':descricao', $this->descricao);
            $query->bindParam(':imagem', $this->imagem);

            $query->execute(); 
            
            session_start();
            $_SESSION['sucesso'] = ['msn' => "PRODUTO ATUALIZADO COM SUCESSO !", 'count'=> 0];
            header("Location: /listar");
        }

        public function delete(){
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM produtos WHERE id = :id;");
            $query->bindParam(':id', $this->id);
            $query->execute();

            header("Location: /listar");
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
