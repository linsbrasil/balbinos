<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author emers
 */
//include_once '../../modelo/conexao/Conexao.php';
class Funcionario {
    private $table;
    private $table_uni;
    private $con;
    private $Plantao;
    private $Id;
    private $Nome;
    private $Sobrenome;
    private $Nascimento;
    private $Email;
    private $Cargo;
    private $Senha;
    private $Nivel;
    private $Unidade;
    private $SenhaRetorno;
    private $SenhaCripto;
    
    function __construct() {
        $this->table = "funcionario";
        $this->table_uni = "unidade";
        $this->con = (new conexao())->getConecta();
    }
    public function cadastraFuncionario($unidade, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->Unidade = trim(filter_var($unidade));
        $this->Plantao = $plantao = ucfirst(trim(filter_var($plantao)));
        $this->Nome = $nome = ucfirst(strtolower( trim(filter_var($nome))));
        $this->Sobrenome = $sobreNome = ucfirst(strtolower(trim(filter_var($sobreNome))));
        $this->Nascimento = $nascimento = trim(filter_var($nascimento));
        $email = trim(filter_var($email));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $email;
        $senha = $this->geraSenha();
        $this->Senha = $senha;
        //$this->Senha = $senhaCripto = md5($senha);
        $this->Cargo = $cargo = strtoupper( trim(filter_var($cargo)));
 
        $sql = "INSERT INTO ".$this->table." ( unidade_idunidade, plantao, nome, sobrenome, nascimento, email, senha, cargo, nivel, ativo) VALUES ('$this->Unidade', '$this->Plantao', '$this->Nome', '$this->Sobrenome', '$this->Nascimento', '$this->Email', '$this->Senha', '$this->Cargo', '1', 'S')";
        $query = mysqli_query($this->con, $sql)or die("Esse e-mail já está cadastrado."); 
        if($query){
            $resultado = "Funcionário cadastrado com sucesso!";
            $sqlB = "SELECT senha FROM ".$this->table." WHERE email ='$this->Email'";
            $queryB = mysqli_query($this->con, $sqlB);
            if($queryB){
                $linha = mysqli_num_rows($query);
                if($linha > 0){
                   while($obj = mysqli_fetch_array($query)){
                       $resposta[] = $obj;
                   } 
                   foreach ($resposta as $value) {
                       $senhaB = $value['senha'];
                   }
                   $this->SenhaRetorno = $senhaB;
                   try {
                       $this->enviarSenha($this->Email, $this->SenhaRetorno);
                   } catch (Exception $exc) {
                       echo 'Senha não foi enviada para o email do funcionário';
                   }
                   $this->SenhaCripto = md5($senhaB);
                   $sqlC = "UPDATE ".$this->table." SET senha = '$this->SenhaCripto'  WHERE email = '$this->Email'";
                   $query = mysqli_query($this->con, $sqlC) or die('Erro ao salvar senha criptografada');
                }       
            }
        } else {
            $resultado = "Falhou! Tente novamente.";
        }
        
       return $resultado; 
    }
    
    public function selecionaFuncionario($id){
        $this->Id = $id;
        $sql = "SELECT * FROM ".$this->table." WHERE idfuncionario ='$this->Id'";
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
       public function selecionaTudo(){
        $sql = "SELECT * FROM ".$this->table." ORDER BY idfuncionario DESC";
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
        $email = filter_var($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $email;
        $this->Cargo = $cargo = filter_var($cargo);
        $this->Nivel = $nivel = filter_var($nivel, FILTER_VALIDATE_INT);
        
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome',sobrenome = '$this->Sobrenome', email = '$this->Email', cargo = '$this->Cargo', nivel = '$this->Nivel' WHERE id = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if(query){
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
        $email = filter_var($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $email;
        $this->Cargo = $cargo = filter_var($cargo);
        
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome', sobrenome = '$this->Sobrenome',email = '$this->Email', cargo = '$this->Cargo' WHERE id = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if(query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    
    public function atualizarFuncionario($id, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $this->Nome = $nome = ucfirst(strtolower( trim(filter_var($nome))));
        $this->Sobrenome = $sobreNome = ucfirst(strtolower(trim(filter_var($sobreNome))));
        $this->Nascimento = $nascimento = trim(filter_var($nascimento));
        $this->Plantao = $plantao = ucfirst(trim(filter_var($plantao)));
        $this->Cargo = $cargo = strtoupper( trim(filter_var($cargo)));
        $email = trim(filter_var($email));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $email;
        
        $sql = "UPDATE ".$this->table." SET nome = '$this->Nome', sobrenome = '$this->SobreNome', email = '$this->Email', nascimento = '$this->Nascimento', cargo = '$this->Cargo' WHERE idfuncionario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    
    
    public function alterarSenha($id, $senha){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $this->Senha = $senha = filter_var($senha, FILTER_SANITIZE_STRING);
        
        $sql = "UPDATE ".$this->table." SET senha = '$senha' WHERE idfuncionario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if(query){
            $resultado = "Senha alterada com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
    
    public function insereNivel($id, $nivel){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $this->Nivel = $nivel = filter_var($nivel, FILTER_VALIDATE_INT);
        $sql = "UPDATE ".$this->table." SET nivel = '$this->Nivel' WHERE id = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if(query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }

    public function excluirFuncionario($id){
        $this->Id = $id = filter_var($id, FILTER_VALIDATE_INT);
        $sql = "DELETE FROM ".$this->table." WHERE idfuncionario = '$this->Id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Unidade deletado com sucesso";
        } else {
            $resultado = "Não foi possível deletar a unidade selecionada";
        }
        
        return $resultado;
    }

    public function verificarLogin($email, $senha){
        $senha = filter_var($senha, FILTER_SANITIZE_STRING);
        $email = filter_var($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Senha = $senha;
        $this->Email = $email;
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
   
    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
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
    
    function enviarSenha($email, $senha){
        $email_remetente = SITE_EMAIL;
        $headers = "MIME-Version: 1.1\n";
        $headers = "Content-type: text/plain; charset=iso-8859-1\n";
        $headers = "From: $email_remetente\n"; // remetente
        $headers = "Return-Path: $email_remetente\n"; // return-path
        $headers = "Reply-To: $email\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
        $envio = mail($email, "Envio de Senha", "Ola\nSua nova senha: ".$senha."\nVoce pode alterar sua senha ao acessar o sistema\n\nObrigado.", $headers, "-f$email_remetente");
        return $envio;
    }


    public function salvarSenha($email){
        $senha = geraSenha();
        $email = trim(filter_var($email));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Senha = $senhaCripto = md5($senha);
        $this->Email = $email;
        $sql = "UPDATE ".$this->table." SET senha = '$this->Senha' WHERE email = '$this->Email'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $this->enviarSenha($this->Email);
            echo $sucesso;
            $resultado = "Senha alterada com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        
        return $resultado;
    }
}
