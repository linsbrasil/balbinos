<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author emers
 */
//include_once '../../modelo/conexao/Conexao.php';
//include_once '/Usuario.php';
class UsuarioDAO extends Usuario{
    private $table;
    private $table_uni;
    private $con;
    private $SenhaRetorno;
    private $SenhaCripto;
    private $SenhaNova;
    function getSenhaNova() {
        return $this->SenhaNova;
    }

    function setSenhaNova($SenhaNova) {
        $senhaNova = trim($SenhaNova);
        if($senhaNova > 7 && $senhaNova <= 15){
            $this->SenhaNova = $senhaNova;
        }
    }

    
    public function __construct() {
        $this->table = "funcionario";
        $this->table_uni = "unidade";
        $this->con = (new conexao())->getConecta();
    }
    public function cadastrarUsuario($idunidade, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->cadastra($idunidade, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo);
        $senha = $this->geraSenha();
        $this->setSenha($senha);
        $sql = "INSERT INTO ".$this->table." ( idunidade, plantao, nome, sobrenome, nascimento, email, senha, cargo, nivel, ativo) VALUES ('$this->Unidade', '$this->Plantao', '$this->Nome', '$this->Sobrenome', '$this->Nascimento', '$this->Email', '$this->Senha', '$this->Cargo', '1', 'S')";
        $query = mysqli_query($this->con, $sql)or die("Esse e-mail já está cadastrado."); 
        if($query){
            $resultado = "Funcionário cadastrado com sucesso!";
            $this->gravaSenha($this->Email);
        } else {
            $resultado = "Falhou! Tente novamente.";
        }   
       return $resultado; 
    }
    
    public function selecionarUsuario($id){
        $this->setId($id);
        $sql = "SELECT * FROM ".$this->table." WHERE idusuario ='$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
                while($obj = mysqli_fetch_array($query)){
                    $resultado[] = $obj;
                } 
            } else {
                $resultado = "Não contém dados cadastrados deste usuário.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        
        return $resultado;
    }
    public function selecionarTudo(){
        $sql = "SELECT * FROM ".$this->table." ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql);
        if($query == TRUE){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj;   
               }
            } else {
                $resultado = "Não há registros.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        //mysqli_close($this->con);
        return $resultado;
    }
    
        public function selecionarTudoRH($Idunidade){
        $this->setIdunidade($Idunidade);
        $sql = "SELECT * FROM ".$this->table." WHERE idunidade = '$this->Idunidade' ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql);
        if($query == TRUE){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj;   
               }
            } else {
                $resultado = "Não há registros.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        //mysqli_close($this->con);
        return $resultado;
    }
    
    public function selecionarPlantaoChefia($Idunidade, $Cargo, $Plantao){
        $this->setIdunidade($Idunidade);
        $this->setCargo($Cargo);
        $this->setPlantao($Plantao);
        $sql = "SELECT * FROM ".$this->table." WHERE idunidade = '$this->Idunidade' and cargo = '$this->Cargo' and plantao = '$this->Plantao' ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql);
        if($query == TRUE){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj;   
               }
            } else {
                $resultado = "Não há registros.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        //mysqli_close($this->con);
        return $resultado;
    }
    
    public function atualizarFuncionarioAdm($id, $nome, $sobreNome, $email, $cargo, $nivel){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $this->Nome = $nome = filter_var($nome);
        $this->Sobrenome = $sobreNome = filter_var($sobreNome);
        $Email = filter_var($email);
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $Email;
        $this->Cargo = $cargo = filter_var($cargo);
        $this->Nivel = $nivel = filter_var($nivel, FILTER_VALIDATE_INT);
        
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome',sobrenome = '$this->Sobrenome', email = '$this->Email', cargo = '$this->Cargo', nivel = '$this->Nivel' WHERE idusuario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    public function atualizarFuncionarioRH($id, $nome, $sobreNome, $email, $cargo){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $this->Nome = $nome = filter_var($nome);
        $this->Sobrenome = $sobreNome = filter_var($sobreNome);
        $Email = filter_var($email);
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $Email;
        $this->Cargo = $cargo = filter_var($cargo);
        
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome', sobrenome = '$this->Sobrenome',email = '$this->Email', cargo = '$this->Cargo' WHERE idusuario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    
    public function atualizarUsuario($id, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->atualiza($id, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo);    
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome', sobrenome = '$this->Sobrenome', email = '$this->Email', nascimento = '$this->Nascimento', cargo = '$this->Cargo' WHERE idusuario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    
    
    public function alterarSenha($id, $Email, $senha, $senhaNova){
        $this->setId($id);
        $this->setEmail($Email);
        $this->setSenha($senha);
        $this->SenhaNova($senhaNova);
        
        if($this->verificarSenhaExiste($this->Id, $this->Senha)){
            $this->enviarSenha($this->Email, $this->SenhaNova);
            $this->SenhaNova = md5($this->SenhaNova);
            $sql = "UPDATE ".$this->table." SET senha = '$this->SenhaNova' WHERE idusuario = '$this->Id'";
            $query = mysqli_query($this->con, $sql);
            if($query){
                $resultado = "Senha alterada com sucesso";
            } else {
                $resultado = "Não foi possível fazer a atualização";
            }
        }
        
        return $resultado;
    }
    
    public function insereNivel($id, $nivel){
        $this->setId($id);
        $this->setNivel($nivel);
        $sql = "UPDATE ".$this->table." SET nivel = '$this->Nivel' WHERE idusuario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }

    public function excluirUsuario($id){
        $this->setId($id);
        $sql = "DELETE FROM ".$this->table." WHERE idusuario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Unidade deletado com sucesso";
        } else {
            $resultado = "Não foi possível deletar a unidade selecionada";
        }
        
        return $resultado;
    }

    public function verificarLogin($email, $senha){
        $this->login($email, $senha);
        $sql = "SELECT * FROM " . $this->table. " WHERE email = '$this->Email' AND senha = '$this->Senha'";
        $query = mysqli_query($this->con, $sql) or die("Query não comunicou-se o a base de dados.");
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){             
                while($obj = mysqli_fetch_array($query)){
                    $resultado[] = $obj;   
                } 
            } else {
                $resultado = "Usuário não existe.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }       
        return $resultado;
    }
    
    private function verificarSenhaExiste($Id, $Senha){
        //$this->login($email, $senha);
        $this->setId($Id);
        $this->setSenha($Senha);
        $sql = "SELECT * FROM " . $this->table. " WHERE email = '$this->Id' AND senha = '$this->Senha'";
        $query = mysqli_query($this->con, $sql) or die("Query não comunicou-se o a base de dados.");
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){             
                return true;
            } else {
                return false;
            }
        } else {
            return $resultado = "Falha ao consultar a base de dados";
        }       
    }
   
    private function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
            
        if ($maiusculas) {$caracteres .= $lmai;}
        if ($numeros) {$caracteres .= $num;}
        if ($simbolos) {$caracteres .= $simb;}
            
        $len = strlen($caracteres);
            
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
    
    private function enviarSenha($email, $senha){
        try{
        $email_remetente = SITE_EMAIL;
        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: $email_remetente\n"; // remetente
        $headers .= "Return-Path: $email_remetente\n"; // return-path
        $headers .= "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
        $envio = mail($email, "Envio de Senha", "Ola\nSua nova senha: ".$senha."\n".SITE_URL."\nVoce pode alterar sua senha ao acessar o sistema\n\nObrigado.", $headers, "-f$email_remetente");
        return $envio;
        } catch (Exception $exc){
            echo 'Senha não foi enviada para o email do funcionário';
        }
    }

    private function gravaSenha($email){
        $this->setEmail($email);
        $sqlB = "SELECT senha FROM ".$this->table." WHERE email ='$this->Email'";
        $queryB = mysqli_query($this->con, $sqlB);
        if($queryB){
            $linha = mysqli_num_rows($queryB);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resposta[] = $obj;
               } 
               foreach($resposta as $value){
                   $this->SenhaRetorno = $value['senha'];
               }
               $this->enviarSenha($this->Email, $this->SenhaRetorno);
               $this->SenhaCripto = md5($this->SenhaRetorno);
               $sqlC = "UPDATE ".$this->table." SET senha = '$this->SenhaCripto'  WHERE email = '$this->Email'";
               $query = mysqli_query($this->con, $sqlC) or die('Erro ao salvar senha criptografada');
            }       
        }
    }
    
    public function novaSenha($email){
        $this->setEmail($email);
        $senha = geraSenha();
        $this->setSenha($senha);
        //$this->Senha = $senhaCripto = md5($senha);
        $sql = "UPDATE ".$this->table." SET senha = '$this->Senha' WHERE email = '$this->Email'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Senha alterada com sucesso";
            $this->gravaSenha($this->Email);
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }    
        return $resultado;
    }
    public function retornaEmail($Id){
        $this->setId($Id);
        $sql = "SELECT email FROM ".$this->table." WHERE idusuario ='$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query == TRUE){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   return $obj;   
               }
            } else {
                return "Não há registros.";
            }
        } else {
            return "Falha ao consultar a base de dados";
        }
        
    }


    //Fim da classe UsuárioDAO
}
