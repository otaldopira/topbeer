<?php

    class ParceiroController{
 
        public function inserir(){

            $razao = $_POST['razaoSocial'];
            $fantasia = $_POST['fantasia'];
            $cnpj = $_POST['cnpj'];
            $telefone = $_POST['telefone'];
            $email = $_POST['emailEmp'];

            $dados = ['$razao' => $razao, '$fantasia' => $fantasia, '$cnpj' => $cnpj, 'telefone' => $telefone, '$email' => $email];

            if (!Validacao::validaCampoVazio($dados)){
                session_start();
                $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCaracter($razao, $fantasia)){
                session_start();
                $_SESSION['erro'] = ['msn' => "CARACTERES INDISPONÍVEIS !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCnpj($cnpj)){
                session_start();
                $_SESSION['erro'] = ['msn' => "CNPJ INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCelular($telefone)){
                session_start();
                $_SESSION['erro'] = ['msn' => "TELEFONE INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaEmail($email)){
                session_start();
                $_SESSION['erro'] = ['msn' => "E-MAIL INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }
            
            $parceiro = new Parceiro();

            $parceiro->razaoSocial = $razao;
            $parceiro->nomeFantasia = $fantasia;
            $parceiro->CNPJ = $cnpj;
            $parceiro->telefone = $telefone;
            $parceiro->email = $email;

            $parceiro->create();
        }

        public function excluir(){

            $parceiro = new Parceiro();
            $parceiro->id = $_GET['id'];
            $parceiro->delete();

            header('Location: /listar');
        }

        public function editar(){
            
            $parceiro = new Parceiro();
            $parceiro->id = $_GET['id'];
            $fetchOne = $parceiro->fetchOne();
            
            require ("views/editar.parceiros.view.php");
        }

        public function atualizar(){

            $id = $_POST['idPar'];
            $razao = $_POST['razaoSocial'];
            $fantasia = $_POST['fantasia'];
            $cnpj = $_POST['cnpj'];
            $telefone = $_POST['telefone']; 
            $email = $_POST['emailEmp']; 

            $dados = ['$razao' => $razao, '$fantasia' => $fantasia, '$cnpj' => $cnpj, 'telefone' => $telefone, '$email' => $email];

            if (!Validacao::validaCampoVazio($dados)){
                session_start();
                $_SESSION['erro'] = ['msn' => "PREENCHA TODOS OS CAMPOS !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCaracter($razao, $fantasia)){
                session_start();
                $_SESSION['erro'] = ['msn' => "CARACTERES INDISPONÍVEIS !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCnpj($cnpj)){
                session_start();
                $_SESSION['erro'] = ['msn' => "CNPJ INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaCelular($telefone)){
                session_start();
                $_SESSION['erro'] = ['msn' => "TELEFONE INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }

            if (!Validacao::validaEmail($email)){
                session_start();
                $_SESSION['erro'] = ['msn' => "E-MAIL INVÁLIDO !", 'count'=> 0];
                header('Location: /parceiro/cadastrar');
                exit();
            }
    
            $parceiro = new Parceiro();
            $parceiro->id = $id;
            $parceiro->razaoSocial = $razao; 
            $parceiro->nomeFantasia = $fantasia;
            $parceiro->CNPJ = $cnpj;
            $parceiro->telefone = $telefone;
            $parceiro->email = $email;

            $parceiro->update();
        }
    }
    
