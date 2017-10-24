<?php
/**
 * Description of Folga
 *
 * @author emerson
 */
class FolgaDAO extends Folga {
    private $table;
    private $table_func;
    private $table_hist;
    private $con;
    private $usuario;
            function __construct() {
        $this->table = "folgas";
        $this->table_func = "funcionario";
        $this->table_hist = "historico";
        $this->con = (new Conexao())->getConecta();
        $this->usuario = new UsuarioDAO();
    }
    public function cadastrarFolga($array){
        extract($array);  
        //Explodindo as data para dia, mês e ano separados
        //Data retornada de um input tipo date fica no formato YYYY/MM/DD
        $data = $Data;
        $data = explode("-", $data);
        list($Ano, $Mes, $Dia ) = $data;
        //Pegando o nome do chefe que agendou a folga
        $resultado = $this->usuario->selecionarUsuario($Idchefe);
        foreach ($resultado as $lin){
            $Chefenome = $lin['nome'];
            $Sobrenome = $lin['sobrenome'];
        }
        //Concatenando nome e sobrenome do chefe
        $Chefenome .= " ";
        $Chefenome .= $Sobrenome;
        
        $this->setIdunidade($Idunidade);
        $this->setIdchefe($Idchefe);
        $this->setIdusuario($Idusuario);
        $this->setChefenome($Chefenome);
        $this->setUsuario($Usuario);
        $this->setCargo($Cargo);
        $this->setTurno($Turno);
        $this->setTipo($Tipo);
        $this->setData($Data);
        $this->setDia($Dia);
        $this->setMes($Mes);
        $this->setAno($Ano);
        $this->setObs($Obs);
        
        //Verifica se o usuário já agendou folga para esta data
        $verificar = $this->exibirFolgaPorMesAnoTipo($this->getIdusuario(), $this->getTipo(), $this->getMes(), $this->getAno());
        if($verificar){
            return $this->getTipo(); 
        } else {
            $verif = $this->exibirFolgaPorData($this->getIdusuario(), $this->getDia(), $this->getMes(), $this->getAno());
            if($verif){
                foreach ($verif as $ver){
                    $tip = $ver['tipo'];
                }
                return "existe-".$tip;
            } else {
               $sql = "INSERT INTO ".$this->table." ( idunidade, idchefe, idusuario, chefenome, usuario, cargo, turno, tipo, data, dia, mes, ano, obs) VALUES "
                        . "('{$this->getIdunidade()}', '{$this->getIdchefe()}', '{$this->getIdusuario()}', '{$this->getChefenome()}', '{$this->getUsuario()}',  '{$this->getCargo()}',"
                        . "'{$this->getTurno()}','{$this->getTipo()}', '{$this->getData()}','{$this->getDia()}', '{$this->getMes()}', '{$this->getAno()}', '{$this->getObs()}')";
                //
                $query = mysqli_query($this->con, $sql) or die("Não foi possível a conexão com a base de dados.");
                if($query){
                    return 'ok'; 
                }else{
                    return false;////
                }
            }
        }
    }
    public function editarFolga($array){
        extract($array);  
        //Explodindo as data para dia, mês e ano separados
        //Data retornada de um input tipo date fica no formato YYYY/MM/DD
        $data = $Data;
        $data = explode("-", $data);
        list($Ano, $Mes, $Dia ) = $data;
        //Pegando o nome do chefe que agendou a folga
        $Idchefe = 1;
        $Idunidade = 1;
        $Turno = 2;
        $resultado = $this->usuario->selecionarUsuario($Idchefe);
        foreach ($resultado as $lin){
            $Chefenome = $lin['nome'];
            $Sobrenome = $lin['sobrenome'];
        }
        //Concatenando nome e sobrenome do chefe
        $Chefenome .= " ";
        $Chefenome .= $Sobrenome;
        //Setando
        $this->setIdfolga($Idfolga);
        $this->setIdchefe($Idchefe);
        $this->setUsuario($Usuario);
        $this->setTipo($Tipo);
        if(empty($Datanova) || $Datanova == null){
            $this->setData($Data);
        } else {
            $this->setData($Datanova);
        }
        $this->setDia($Dia);
        $this->setMes($Mes);
        $this->setAno($Ano);
        $this->setObs($Obs);
        $sql = "UPDATE ".$this->table." SET idchefe = '{$this->getIdchefe()}', "
                . " chefenome = '{$this->getChefenome()}', tipo = '{$this->getTipo()}',"
                . " data = '{$this->getData()}', dia = '{$this->getDia()}', "
                . " mes = '{$this->getMes()}', ano = '{$this->getAno()}', "
                . " obs = '{$this->getObs()}' WHERE idfolga = '{$this->getIdfolga()}'";
        $query = mysqli_query($this->con, $sql) or die("Não foi possível a conexão com a base de dados.");
        if($query){
           return true; 
        }else{
           return false;
        }
        
    }
    public function exibirFolga($Idfolga){
        $this->setIdfolga($Idfolga);
        $sql = "SELECT * FROM ".$this->table." WHERE idfolga = '{$this->getIdfolga()}' ";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
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
    
    public function excluirFolga($Idfolga){
        $this->setIdfolga($Idfolga);
        $sql = "DELETE FROM ".$this->table." WHERE idfolga = '{$this->getIdfolga()}' ";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
    public function exibirEscalaTurnoFuncionario($Idunidade, $Cargo, $Turno, $Mes, $Ano){ 
        $this->setIdunidade($Idunidade);
        $this->setCargo($Cargo);
        $this->setTurno($Turno);  
        $this->setMes($Mes);
        $this->setAno($Ano);
        $sql = "SELECT * FROM ".$this->table." WHERE idunidade = '{$this->getIdunidade()}' "
        . " and cargo = '{$this->getCargo()}' and turno = '{$this->getTurno()}' and mes = "
        . "'{$this->getMes()}' and ano = '{$this->getAno()}' ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
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
    public function exibirUsuario($Idunidade, $Cargo, $Turno, $Mes, $Ano ){
        $this->setIdunidade($Idunidade);
        $this->setCargo($Cargo);
        $this->setTurno($Turno);
        $this->setMes($Mes);
        $this->setAno($Ano);
        $sql = "SELECT DISTINCT idusuario, usuario FROM ".$this->table." WHERE idunidade = '{$this->getIdunidade()}' "
        . " and cargo = '{$this->getCargo()}' and turno = '{$this->getTurno()}' and mes = '{$this->getMes()}' "
        . "and ano = '{$this->getAno()}' ORDER BY idusuario DESC";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj;
               }
                return $resultado;
            } else {
                return false;
            }
        }      
    }

    //exibe folga do funcionário, tanto faz se for sap, abonada...etc.
    public function exibirFolgaPorData($Idusuario,$Dia, $Mes, $Ano){
        $this->setIdusuario($Idusuario);
        $this->setDia($Dia);
        $this->setMes($Mes);
        $this->setAno($Ano);
        $sql = "SELECT * FROM ".$this->table." WHERE idusuario = '{$this->getIdusuario()}' "
        . " and dia = '{$this->getDia()}' and mes = '{$this->getMes()}' and ano = '{$this->getAno()}'";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj; 
                   return $resultado;
               }
            } else {
                return false;//$resultado = "Não há registros.";
            }
        }
    }
    
    public function exibirFolgaPorMesAnoTipo($Idusuario, $Tipo, $Mes, $Ano){
        $this->setIdusuario($Idusuario);
        $this->setTipo($Tipo);
        $this->setMes($Mes);
        $this->setAno($Ano);
        $sql = "SELECT * FROM ".$this->table." WHERE idusuario = '{$this->getIdusuario()}' "
        . " and mes = '{$this->getMes()}' and ano = '{$this->getAno()}' and tipo = '{$this->getTipo()}'";
        $query = mysqli_query($this->con, $sql) or die("Falha ao consultar a base de dados");
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
                return true;  
            } else {
                return false;//$resultado = "Não há registros.";
            }
        }
    }
    
    public function cancelarFolga($idfuncionario,$idfolga){}//cancela folga do funcionário do mês corrente
    public function exibirTudo(){}//exibe todas as folgas do turno no mês corrente
    public function exibirSapMes(){}//exibe folga sap do funcionário no mês corrente
    public function exibirAbMes(){}//exibe folga abonada do funcionário no mês corrente
    public function exibirConvMes(){}//exibe folga convocada do funcionário no mês corrente
    public function exibirDoaMes(){}//exibe folga doação de sangue do funcionário no mês corrente
    public function exibirEleitoralMes(){}//exibe folga Eleitoral do funcionário no mês corrente

    public function exibeSapAno(){}//exibe a quantidade de folga sap do funcionário no ano corrente
    public function exibeAbAno(){}//exibe a quantidade de folga abonada do funcionário no ano corrente
    public function exibeDoaAno(){}//exibe a quantidade de folga doação de sangue do funcionário no ano corrente
    public function exibeEleitoralAno(){}//exibe a quantidade de folga eleitoral do funcionário no ano corrente
    public function exibeConvAno(){}//exibe a quantidade de folga convocada do funcionário no ano corrente

    public function cancelarTodasAbMes(){}//cancela todas abonadas do mês
    public function cancelarTodasAbDia(){}//cancela todas abonadas do dia
    public function cancelarTudoDia(){}//Cancela todas as folgas do dia


}
?>