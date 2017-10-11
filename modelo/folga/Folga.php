<?php

/**
 * Description of Folga
 *
 * @author emerson
 */
//include_once '../modelo/conexao/Conexao.php';
class Folga {
    private $table;
    private $table_func;
    private $table_hist;
    private $con;
    function __construct() {
        $this->table = "folga";
        $this->table_func = "funcionario";
        $this->table_hist = "historico";
        $this->con = (new conexao())->getConecta();
    }
    public function marcarFolga($idChefe, $idFuncionario, $dataFolga, $tipoFolga){}
    public function alterarFolga($idChefe, $idFuncionario, $dataFolga, $tipoFolga){}
    public function exibirFolga(){}//exibe folga do funcionário, tanto faz se for sap, abonada...etc.
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