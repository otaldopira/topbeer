<?php 

    class Carrinho{

        private $id;
        private $valor;
        private $quantidade;
        private $total;

        public function buy(){
            try{
                $bd = Conexao::get();
                $bd -> beginTransaction();
                $usuario = new Usuario();
                $produtos = new Produto();
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
                    }else {
                        throw new Exception('Você não possui dinheiro suficiente');
                    }

                    foreach ($_SESSION['carrinho'] as $id => $produto){
                        $produtos->id = $id;
                        $resultProd = $produtos->search();
                        if ($resultProd->quantidade >= 0){
                            $query = $bd -> prepare("UPDATE produtos SET quantidade = :quantidade WHERE id = :id");
                            $quanti = $resultProd->quantidade - $produto['quantidade'];
                            $query->bindValue(':quantidade', $quanti);
                            $query->bindValue(':id', $id);
                            $query->execute();
                        } 
                        else {
                            throw new Exception('Estoque insuficiente !');   
                        }

                        $query = $bd->prepare("INSERT INTO vendas (id_usuario, id_produto, valor, quantidade) VALUES (:id_usuario, :id_produto, :valor, :quantidade);");
                        $query->bindValue(':id_usuario', $_SESSION['id']);
                        $query->bindValue(':id_produto', $id);
                        $subTotal = $produto['preco'] * $produto['quantidade'];
                        $query->bindValue(':valor', $subTotal);
                        $query->bindValue(':quantidade', $produto['quantidade']);
                        $query->execute();
                        
                    }

                    unset($_SESSION['carrinho']);
                    unset($_SESSION['total']);
                    $acao = 'sucesso';
                    $bd->commit();
                    header("Location: /carrinho/{$acao}");
                }
            }catch(Exception $e){
                $m = $e->getMessage();
                $_SESSION['erro'] = ['msn' => "$m", 'count' => 0]; 
                $bd->rollback();
                header('Location: /carrinho/erro');
                
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