<div class="container-fluid" id="oro" style="text-align: center;">
    <h2 style="color:red;">Parabéns!</h2>
    <div class ="row">
        <h4>
            <?php
                if($_GET['result']){
                    $resultado = $_GET['result']; 
                    switch ($resultado){
                        case "sap":
                            $result = 'Folga <span style = "color:red;">SAP</span> agendada com sucesso';
                            break;
                        case "abo":
                            $result = 'Folga <span style = "color:red;">ABONADA</span> agendada com sucesso';
                            break;
                        case "con":
                            $result = 'Folga <span style = "color:red;">CONVOCADA</span> agendada com sucesso';
                            break;
                        case "doa":
                            $result = 'Folga <span style = "color:red;">DOAÇÃO DE SANGUE</span> agendada com sucesso';
                            break;
                        case "ele":
                            $result = 'Folga <span style = "color:red;">ELEITORAL</span> agendada com sucesso';
                            break;
                        case "excluido":
                            $result = 'Folga <b>excluida</b> com sucesso';
                            break;
                        default :
                            $result = 'Folga agendada com sucesso.';
                    }
                    echo $result;
                }
                if($_GET['result'])
            ?>
        </h4>
    </div>
    <br>
    <div class="row">
        <a href="escala" class="btn btn-primary">Ver Escala</a>  
    </div>
</div>

