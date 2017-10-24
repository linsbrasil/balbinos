<div class="container-fluid" style="text-align: center;" id="oro">
    <br><br>
    <?php 
        include_once '../../inc/inc.php';
        $Idusuario = $_GET['idusuario'];
        $Idfolga = $_GET['idfolga'];
        $usuario = new UsuarioDAO();
        $resultado = $usuario->selecionarUsuario($Idusuario);
        foreach ($resultado as $lin){
            $nome      = $lin['nome'];
            $sobrenome = $lin['sobrenome'];
        }
        $folga = new FolgaDAO();
        $result = $folga->exibirFolga($Idfolga);
        if($result){
            foreach ($result as $res){
                $Tipo = $res['tipo'];
                $data = $res['data'];
            }
        } else {
           header('location:'.SITE_URL.'/CHEFIA/escala'); 
        }
        switch ($Tipo){
                        case "sap":
                            $tipo = 'SAP';
                            break;
                        case "abo":
                            $tipo = 'ABONADA';
                            break;
                        case "con":
                            $tipo = 'CONVOCADA';
                            break;
                        case "doa":
                            $tipo = 'DOAÇÃO DE SANGUE';
                            break;
                        case "ele":
                            $tipo = 'ELEITORAL';
                            break;
                    }
        $data = explode("-", $data);
        list($ano, $mes, $dia) = $data;
        $data = "$dia/$mes/$ano";
        echo '<h4>Funcionário: '. ucfirst($nome).' '. ucfirst($sobrenome).'</h4> ';
        echo '<h4>Folga <span style="color:red;">'.strtoupper($tipo).'</span> agendada para: '.$data.'</h4>';
    ?>
    
    <br>
    <div class="row" style="text-align: center;">
        <a class="btn btn-primary" href="editar_folga&idusuario=<?php echo $Idusuario; ?>&idfolga=<?php echo $Idfolga; ?>">Editar</a>
        <a  class="btn btn-danger" href="<?php echo SITE_URL; ?>/controle/folga/excluir.php?idfolga=<?php echo $Idfolga; ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
    </div>
</div>
