<?php

    class Login{

        private $CPF;
        private $senha;

        public function buscarUsuario(){

            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM usuarios WHERE CPF = :CPF AND senha = :senha;");
            $query->bindParam(":CPF", $this->CPF);
            $query->bindParam(":senha", $this->senha);
            $query->execute();

            if($query->rowCount() == 0){
                header('Location: /login/?erro=CPF ou senha inválidos!');
                return false;
            }else{ 
                session_start();
                $result = $query -> fetch(PDO::FETCH_OBJ);   
                $_SESSION['id'] = $result->id;
                $_SESSION['logado'] = true;
                $_SESSION['nivelUser'] = $result->nivelAutorizacao;
                header('Location: /home');
                return true;
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


// function fazerLogin($usuarios, $cpf, $senha){
    
//     foreach ($usuarios as $id => $user) {
//         echo $user['CPF'];
//         if ($user['CPF'] == $cpf && $user['SENHA'] == $senha) {
//             session_start();
//             $_SESSION['logado'] = true;
//             $_SESSION['cpf'] = $user['CPF'];
//             $_SESSION['nome'] = $user['NOME'];
//             $_SESSION['bebumCoins'] = $user['BEBUMCOINS'];
//             $_SESSION['nivelUser'] = $user['REQUISICAO'];
//             return true;
//         } 
//     }

//     return false;
//}
