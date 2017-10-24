<?php
/**
 * Description of UsuarioDAO
 *
 * @author emers
 */
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
        $this->con = (new Conexao())->getConecta();
    }
    public function cadastrarUsuario($Idunidade, $Turno, $Nome, $Sobrenome, $Nascimento, $Email, $Cargo){
        $this->setIdunidade($Idunidade);
        $this->setTurno($Turno);
        $this->setNome($Nome);
        $this->setSobrenome($Sobrenome);
        $this->setNascimento($Nascimento);
        $this->setEmail($Email);
        $this->setCargo($Cargo);
        //Aqui será gerada uma senha aleatória pelo sistema
        $Senha = $this->geraSenha();
        $this->setSenha($Senha);
        $sql = "INSERT INTO ".$this->table." ( idunidade, turno, nome, sobrenome, nascimento, email, senha, "
                . "cargo, nivel, ativo) VALUES ('{$this->getIdunidade()}', '{$this->getTurno()}', "
                . "'{$this->getNome()}', '{$this->getSobrenome()}', '{$this->getNascimento()}', "
                . "'{$this->getEmail()}', '{$this->getSenha()}', '{$this->getCargo()}', '1', 'S')";
                
        $query = mysqli_query($this->con, $sql)or die("Esse e-mail já está cadastrado."); 
        if($query){
            $resultado = "Funcionário cadastrado com sucesso!";
            $this->gravaSenha($this->getEmail());
        } else {
            $resultado = "Falhou! Tente novamente.";
        }
       return $resultado; 
    }
    
    public function selecionarUsuario($Id){
        $this->setId($Id);
        $sql = "SELECT * FROM ".$this->table." WHERE idusuario ='{$this->getId()}'";
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
        if($query){
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
        return $resultado;
    }
    
    public function selecionarTudoRH($Idunidade){
        $this->setIdunidade($Idunidade);
        $sql = "SELECT * FROM ".$this->table." WHERE idunidade = '{$this->getIdunidade()}' ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql);
        if($query){
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
        return $resultado;
    }

    public function selecionarTurno($Idunidade, $Cargo, $Turno){
        $this->setIdunidade($Idunidade);
        $this->setCargo($Cargo);
        $this->setTurno($Turno);
        $sql = "SELECT * FROM ".$this->table." WHERE idunidade = "
                . "'{$this->getIdunidade()}' and cargo = '{$this->getCargo()}' "
                . "and turno = '{$this->getTurno()}' ORDER BY idusuario DESC";
                
        $query = mysqli_query($this->con, $sql);
        if($query){
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
        return $resultado;
    }
    public function atualizarUsuario($Id, $Nome, $Sobrenome, $Nascimento, $Email, $Turno, $Cargo){
        $this->setId($Id);
        $this->setNome($Nome);
        $this->setSobrenome($Sobrenome);
        $this->setNascimento($Nascimento);
        $this->setEmail($Email);
        $this->setTurno($Turno);
        $this->setCargo($Cargo);
        $sql = "UPDATE ".$this->table." SET nome = '{$this->getNome()}', sobrenome = '{$this->getSobrenome()}',"
        . " email = '{$this->getEmail()}', nascimento = '{$this->getNascimento()}', cargo = '{$this->getCargo()}'"
        . " WHERE idusuario = '{$this->getId()}'";
        
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        return $resultado;
    }
    
    
    public function alterarSenha($Id, $Email, $Senha, $SenhaNova){
        $this->setId($Id);
        $this->setEmail($Email);
        $this->setSenha($Senha);
        $this->setSenhaNova($SenhaNova);
        
        if($this->verificarSenhaExiste($this->getId(), $this->getSenha())){
            $this->enviarSenha($this->getEmail(), $this->getSenhaNova());
            $this->setSenhaNova(md5($this->getSenhaNova()));
            $sql = "UPDATE ".$this->table." SET senha = '{$this->getSenhaNova()}' WHERE idusuario = '{$this->getId()}'";
            $query = mysqli_query($this->con, $sql);
            if($query){
                $resultado = "Senha alterada com sucesso";
            } else {
                $resultado = "Não foi possível fazer a atualização";
            }
        }
        return $resultado;
    }
    
    public function insereNivel($Id, $Nivel){
        $this->setId($Id);
        $this->setNivel($Nivel);
        $sql = "UPDATE ".$this->table." SET nivel = '{$this->getNivel()}' WHERE idusuario = '{$this->getId()}'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        return $resultado;
    }

    public function excluirUsuario($Id){
        $this->setId($Id);
        $sql = "DELETE FROM ".$this->table." WHERE idusuario = '{$this->getId()}'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Unidade deletado com sucesso";
        } else {
            $resultado = "Não foi possível deletar a unidade selecionada";
        }
        return $resultado;
    }
    
    public function novaSenha($Email){
        $this->setEmail($Email);
        $Senha = geraSenha();
        $this->setSenha($Senha);
        $sql = "UPDATE ".$this->table." SET senha = '{$this->getSenha()}' WHERE email = '{$this->getEmail()}'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Senha alterada com sucesso";
            $this->gravaSenha($this->getEmail());
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        return $resultado;
    }
    public function retornaEmail($Id){
        $this->setId($Id);
        $sql = "SELECT email FROM ".$this->table." WHERE idusuario ='{$this->getId()}'";
        $query = mysqli_query($this->con, $sql);
        if($query){
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
        return $resultado;
    }

    protected function verificarLogin($Email, $Senha){
        $this->setEmail($Email);
        $this->setSenha($Senha);
        $sql = "SELECT * FROM " . $this->table. " WHERE email = '{$this->getEmail()}' AND senha = '{$this->getSenha()}'";
        $query = mysqli_query($this->con, $sql);
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
    //Função ver verificarSenhaExiste($Id, $Senha) está sendo usada na função alterarSenha()
    private function verificarSenhaExiste($Id, $Senha){
        $this->setId($Id);
        $this->setSenha($Senha);
        $sql = "SELECT * FROM " . $this->table. " WHERE email = '{$this->getId()}' AND senha = '{$this->getSenha()}'";
        $query = mysqli_query($this->con, $sql);
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

    private function gravaSenha($Email){
        $this->setEmail($Email);
        $sqlB = "SELECT senha FROM ".$this->table." WHERE email ='{$this->getEmail()}'";
        $queryB = mysqli_query($this->con, $sqlB);
        if($queryB){
            $linha = mysqli_num_rows($queryB);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resposta[] = $obj;
               } 
               foreach($resposta as $value){
                   $this->setSenhaRetorno = $value['senha'];
               }
               $this->enviarSenha($this->Email, $this->SenhaRetorno);
               $this->SenhaCripto = md5($this->SenhaRetorno);
               $sqlC = "UPDATE ".$this->table." SET senha = '$this->SenhaCripto'  WHERE email = '{$this->getEmail()}'";
               $query = mysqli_query($this->con, $sqlC) or die('Erro ao salvar senha criptografada');
            }       
        }
    }
}//Fim da classe UsuárioDAO
?>
