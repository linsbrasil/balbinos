<?php
/**
 * Description of login
 *
 * @author emers
 */
final class LoginDAO extends UsuarioDAO{   
    function __construct(){
    parent::__construct();        
    }
    public function logar($login){
        extract($login);
        $this->setEmail($email);
        $this->setSenha($senha);
        $resultado = $this->verificarLogin($this->getEmail(), $this->getSenha());
        if($this->Resultado){
            foreach ($resultado as $lin) {
                $this->setId($lin['idusuario']);
                $this->setNome($lin['nome']);
                $this->setEmail($lin['email']);
                $this->setNivel($lin['nivel']);
                $this->setAtivo($lin['ativo']);
                $this->setIdunidade($lin['idunidade']);
                $this->setTurno($lin['turno']);
                $this->setCargo($lin['cargo']);
            }
            //Iniciando uma sessão
            session_start();
            //Se já houver uma sessão criada anteriormente será destruida
            session_destroy();
            //Criando uma nova sesssão de login
            $_SESSION['id_login'] = $this->getId();
            $_SESSION['nome_login'] = $this->getNome();
            $_SESSION['email_login'] = $this->getEmail();
            $_SESSION['nivel_login'] = $this->getNivel();
            $_SESSION['ativo_login'] = $this->getAtivo();
            $_SESSION['idunidade_login'] = $this->getIdunidade();
            $_SESSION['turno_login'] = $this->getTurno(); 
            $_SESSION['cargo_login'] = $this->getCargo();
            return true;
        }else{
        return false;
        }
    }
}
