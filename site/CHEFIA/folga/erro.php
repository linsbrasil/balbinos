<div class="container-fluid" id="oro" style="text-align: center;">
    <h2>Oops!</h2>
    <div class ="row">
        <h4>
            <?php   
                if($_GET['result']){
                    $resultado = $_GET['result']; 
                    switch ($resultado){
                    case "sap":
                        $result = 'O usuário já possui folga <span style = "color:red;">SAP</span> agendada para este mês';
                        break;
                    case "abo":
                        $result = 'O usuário já possui folga <span style = "color:red;">ABONADA</span> agendada para este mês';
                        break;
                    case "con":
                        $result = 'O usuário já possui folga <span style = "color:red;">CONVOCADA</span> agendada para este mês';
                        break;
                    case "doa":
                        $result = 'O usuário já possui folga <span style = "color:red;">DOAÇÃO DE SANGUE</span> agendada para este mês';
                        break;
                    case "ele":
                        $result = 'O usuário já possui folga <span style = "color:red;">ELEITORAL</span> agendada para este mês';
                        break;
                    case "existe-sap":
                        $result = 'O usuário já possui folga <span style = "color:red;">SAP</span> agendada para esta data';
                        break;
                    case "existe-abo":
                        $result = 'O usuário já possui folga <span style = "color:red;">ABONADA</span> agendada para esta data';
                        break;
                    case "existe-con":
                        $result = 'O usuário já possui folga <span style = "color:red;">CONVOCADA</span> agendada para esta data';
                        break;
                    case "existe-doa":
                        $result = 'O usuário já possui folga <span style = "color:red;">DOAÇÃO DE SANGUE</span> agendada para esta data';
                        break;
                    case "existe-ele":
                        $result = 'O usuário já possui folga <span style = "color:red;">ELEITORAL</span> agendada para esta data';
                        break;
                    default:
                        $result = 'O usuário já possui folga '.$resultado.' agendada para este mês';
                        break;
                }
                echo $result;
                } else {
                    echo 'Falhou! Tente novamente.';
                }
            ?>       
        </h4>
    </div>
    <br>
    <div>
        <a href="escala" class="btn btn-primary">Voltar</a>
    </div>    
</div>

