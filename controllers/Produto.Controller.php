<?php

    class ProdutoController{

        public function inserir(){

            $nome = filter_input(INPUT_POST, 'nomeProd', FILTER_SANITIZE_SPECIAL_CHARS);
            $marca = filter_input(INPUT_POST, 'marcaProd', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = $_POST['categoriaProd'];
            $quantidade = $_POST['quantProd'];
            $preco = $_POST['precoProd'];
            $descricao = $_POST['descricaoProd'];

            $dados = ['$nome' => $nome, '$marca' => $marca, '$categoria' => $categoria, '$quantidade' => $quantidade, '$preco' => $preco, '$descricao' => $descricao];

            if (!Validacao::validaCampoVazio($dados)){
                session_start();
                $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
                header('Location: /produto/cadastrar');
                exit();
            }

            if ($categoria === "categoria"){
                session_start();    
                $_SESSION['erro'] = ['msn' => "INSIRA A CATEGORIA !", 'count'=> 0];
                header('Location: /produto/cadastrar');
                exit();
            }

            if (!Validacao::validaQuantPreco($quantidade)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "QUANTIDADE DEVE SER MAIOR QUE 0 !", 'count'=> 0];
                header('Location: /produto/cadastrar');
                exit();
            }

            if (!Validacao::validaQuantPreco($preco)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "PREÇO DEVE SER MAIOR QUE 0 !", 'count'=> 0];
                header('Location: /produto/cadastrar');
                exit();
            }

            if (!Validacao::validaDescricao($descricao)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "DESCRIÇÃO DEVE TER PELO MENOS 5 CARACTERES !", 'count'=> 0];
                header('Location: /produto/cadastrar');
                exit();
            }
        

            $produto = new Produto();
            $produto->nome = $_POST['nomeProd'];
            $produto->marca = $_POST['marcaProd'];
            $produto->categoria = $_POST['categoriaProd'];
            $produto->quantidade = $_POST['quantProd'];
            $produto->preco = $_POST['precoProd'];
            $produto->descricao = $_POST['descricaoProd'];
            $produto->imagem = $this->foto() ?? null;
            $produto->create();
        }

        public function foto(){
            $arquivo = $_FILES['fotoProd'];
            
            if(!empty($arquivo['name'])){

            }
            if(!preg_match('/^(image)\/(jpg|png|jpeg)$/', $arquivo['type'])){
                    
            }
            if($arquivo['size'] > 500000){

            }
           
                $imagem = pathinfo($arquivo['name']);
                $nomeImagem = $imagem['filename']. '.' . $imagem['extension'] ?? null;
                $pasta = '/images/uploads/' . $nomeImagem;
                $caminho = $_SERVER['DOCUMENT_ROOT']. $pasta;
                if(move_uploaded_file($arquivo['tmp_name'], $caminho)){
                    echo 'Deu bom !';
                    return $pasta;
                }
        }
        
        public function procurar($id){
            $produto = new Produto();
            $produto->id = $id;
            $produtoDescricao = $produto->search();
            
            require('views/descricao.view.php');
        }

        public function editar(){
            $produto = new Produto();
            $produto->id = $_GET['id'];
            $prodRes = $produto->search();
            require('views/editar.produto.view.php');
        }

        public function atualizar(){

            $id = $_POST['idProd'];
            $nome = $_POST['nomeProd'];
            $marca = $_POST['marcaProd'];
            $categoria = $_POST['categoriaProd'];
            $quantidade = $_POST['quantProd'];
            $preco = $_POST['precoProd'];
            $descricao = $_POST['descricaoProd'];

            $dados = ['$nome' => $nome, '$marca' => $marca, '$categoria' => $categoria, '$quantidade' => $quantidade, '$preco' => $preco, '$descricao' => $descricao];

            if (!Validacao::validaCampoVazio($dados)){
                session_start();
                $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            if (!Validacao::validaCaracter($nome, $marca)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "CARACTERES INDISPONÍVEIS !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            if ($categoria === "categoria"){
                session_start();    
                $_SESSION['erro'] = ['msn' => "INSIRA A CATEGORIA !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            if (!Validacao::validaQuantPreco($quantidade)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "QUANTIDADE DEVE SER MAIOR QUE 0 !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            if (!Validacao::validaQuantPreco($preco)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "PREÇO DEVE SER MAIOR QUE 0 !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            if (!Validacao::validaDescricao($descricao)){
                session_start();    
                $_SESSION['erro'] = ['msn' => "DESCRIÇÃO DEVE TER PELO MENOS 5 CARACTERES !", 'count'=> 0];
                header('Location: /listar');
                exit();
            }

            $produto = new Produto();
            $produto->id = $id;
            $produto->nome = $nome;
            $produto->marca = $marca;
            $produto->categoria = $categoria;
            $produto->quantidade = $quantidade;
            $produto->preco = $preco;
            $produto->descricao = $descricao;
            $produto->imagem = $this->foto() ?? null;
            $produto->update();

        }

        public function excluir(){
            $produto = new Produto();
            $produto->id = $_GET['id'];
            $produto->delete();
        }
    
    }

  

