<?php 

    class Carrinho{

        private $id;
        private $valor;
        private $quantidade;
        private $total;

        public function buy(){
            $bd = Conexao::get();
            $usuario = new Usuario();
            session_start();
            if(isset($_SESSION['id'])){
                $usuario->id = $_SESSION['id'];
                $resultUser = $usuario->fetchOne();
                $this->total = $resultUser->bebumCoins - $_SESSION['total'];
                if($this->total >= 0){
                    $query = $bd -> prepare("UPDATE usuarios SET bebumCoins = :bebumCoins WHERE id = :id");
                    $query->bindValue(':bebumCoins', $this->total);
                    $query->bindValue(':id', $_SESSION['id']);
                    $query->execute();
                    unset($_SESSION['carrinho']);
                    unset($_SESSION['total']);
                    $acao = 'sucesso';
                    header("Location: /carrinho/{$acao}");
                }
            }
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