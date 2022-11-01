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
    
            $parceiro = new Parceiro();
            $parceiro->id = $_POST['idPar'];
            $parceiro->razaoSocial = $_POST['razaoSocial'];
            $parceiro->nomeFantasia = $_POST['fantasia'];
            $parceiro->CNPJ = $_POST['cnpj'];
            $parceiro->telefone = $_POST['telefone'];
            $parceiro->email = $_POST['emailEmp'];
            $parceiro->update();
        }
    }
    





    // function validaTelefone($telefone){
    //     $telefone= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

    //     $regexCel = '/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/';
    //     if (preg_match($regexCel, $telefone)) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // function validaEmail($email){
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         return false;
    //     }
    //     return true;
    // }


    // if(validaCampoVazio($razao, $fantasia, $cnpj, $telefone, $email) != 1)
    //     $msn = 'Obrigatório preencher todos os campos !'; 
    // else
    //     if(validaRazaoFantasia($razao, $fantasia) != 1)
    //         $msn = 'Não é possível utilizar caracter especial !'; 
    //     else
    //         if(validaCnpj($cnpj) != 1)
    //             $msn = 'CNPJ inválido';
    //         else
    //             if(validaTelefone($telefone) != 1)
    //                 $msn = 'Telefone inválido !';
    //             else
    //                 if(validaEmail($email) != 1)
    //                     $msn = 'E-mail inválido !';
    //                 else    
    //                     cadastraParceiro($razao, $fantasia, $cnpj, $telefone, $email, $empresas);
                            
    // require('../view/cadastro.parceiros.view.php');
?>