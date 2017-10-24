<?php 
    include_once '../../funcoes/calendario.php';
?>
<div class="container-fluid " id='oro'>     
    <div class="container-fluid">
        <h2>Escala de Folgas</h2>
    </div>   
    <div id="top" class="container-fluid">
        <div class="col-md-5">
            <form action="escala_historico" method="post">
                Mês:
                <select id="pegmes" name="pegmes" placeholder="<?php if(!isset($_POST['pegmes']) || empty($_POST['pegmes'])){$dtm = date('m'); echo $dtm;}?>">
                    <?php 
                        if(isset($_POST['pegmes']) || !empty($_POST['pegmes'])){ 
                            $mesoption = verMes($_POST['pegmes']);
                            echo '<option value="'.$_POST['pegmes'].'">'.$mesoption.'</option>';           
                        } else {
                            $dtm = date('m'); echo $dtm;
                            $mesoption = verMes($dtm);
                            echo '<option value="'.$dtm.'" selected>'.$mesoption.'</option>';
                        }
                    ?>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
                &nbsp;&nbsp;
                Ano: <input id="pegano" type="number" value="<?php if(isset($_POST['pegano']) || !empty($_POST['pegano'])){ echo $_POST['pegano'];}?>" placeholder="<?php if(!isset($_POST['pegano']) || empty($_POST['pegano'])){$dta = date('Y'); echo $dta;}?>" name="pegano" min="2017" max="2080">
                <input id='btnescala' type="submit" value="Pesquisar">         
            </form>
        </div>

        <?php 
            /* Pegar o mês*/
            if(empty($_POST['pegmes'])){
                $mesinformado = date('m');//informar o mês da pesquisa
            } else {
                $mesinformado = $_POST['pegmes'];
            }
            /*Pegar o ano*/
            if(empty($_POST['pegano'])){
                $ano_informado = date('Y');//informar o ano da pesquisa
            } else {
                $ano_informado = $_POST['pegano'];
            }
            /* Verificar quantos dias tem o mês informado*/
            $mesref = verMes($mesinformado);
            
            $referencia = $mesref;
            $referencia .= "/";
            $referencia .= $ano_informado;
        ?>
        <div class="col-md-3">
            <?php
                echo '<h4>'.$referencia.'</h4>'; 
            ?>
        </div>
    </div>
    <div class="container-fluid">
        <table> 
        <tr> 
            <td><div style="background-color:#FF4040; width:10px; height:10px;"></div></td>
            <td style="padding-left: 5px;padding-right: 15px;">Domingo</td>
            <td><div style="background-color:yellow; width:10px; height:10px;"></div></td>
            <td style="padding-left: 5px;padding-right: 15px;">Sábado</td>
            <td><div style="background-color:#0080ff; width:10px; height:10px;padding-left: 1px;"></div></td>
            <td style="padding-left: 1px;"> <div style="background:repeating-linear-gradient(45deg,#FF4040,#FF4040 5px,#0080ff 10px,#0080ff 20px); width:10px; height:10px;"></div> </td>
            <td style="padding-left: 1px;"><div style="background:repeating-linear-gradient(45deg,yellow,yellow 5px,#0080ff 10px,#0080ff 20px); width:10px; height:10px;"></div></td>     
            <td style="padding-left: 5px;">Feriados</td>
        </tr>
    </table>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Funcionário</th>
                        <?php
                            $mesDias = verDiasDoMes($mesinformado, $ano_informado);
                            for($i= 1; $i <= $mesDias; $i++){
                                $feriados = array('1/1','21/4','1/5','15/6','7/9','12/10','2/11','15/11','25/12');
                                // Array com os dias da semana
                                $diasemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab');
                                // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
                                $datapi = "$ano_informado/$mesinformado/$i";
                                // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
                                $diasemana_numero = date('w', strtotime($datapi));
                                $datafe = "$i/$mesinformado";
                                if($diasemana[$diasemana_numero] == "Dom"){
                                    if(in_array($datafe, $feriados)){
                                        echo '<th style="background:repeating-linear-gradient(45deg,#FF4040,#FF4040 10px,#0080ff 10px,#0080ff 20px);">'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';
                                    } else {
                                        echo '<th style="background-color:#FF4040;">'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';
                                    }          
                                }elseif ($diasemana[$diasemana_numero] == "Sab") {
                                    if(in_array($datafe, $feriados)){
                                        echo '<th style="background:repeating-linear-gradient(45deg,yellow,yellow 10px,#0080ff 10px,#0080ff 20px);">'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';
                                    } else {
                                        echo '<th style="background-color:yellow;">'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';
                                    }   
                                } elseif (in_array($datafe, $feriados)) {
                                    echo '<th style="background-color:#0080ff;">'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';
                                } else {
                                      echo '<th>'.$diasemana[$diasemana_numero].'<br/>'.$i.'</th>';  
                                } 
                            }           
                        ?>
                    </tr>
                    <?php
                        $mesAtual = date('m');
                        $anoAtual = date('Y');
                        $folga = new FolgaDAO();
                        $resultado = $folga->exibirUsuario($idunidade_login, $cargo_login, $turno_login, $mesinformado, $ano_informado); 
                        if($resultado){
                            foreach ($resultado as $lin){ 
                                $idusuario   = $lin['idusuario'];
                                $usuario  = $lin['usuario'];
                                echo"<tr>";
                                echo"<th style='background-color:#808080;'>".$idusuario."</th><th style='background-color:#C0C0C0;' class='text-capitalize'>".$usuario."</th>";
                                for($i= 1; $i <= $mesDias; $i++){
                                    $result = $folga->exibirFolgaPorData($idusuario, $i, $mesinformado, $ano_informado);
                                    if($result){
                                        foreach ($result as $pin){
                                            $idfolga     = $pin['idfolga'];
                                            $tipofolga   = $pin['tipo'];
                                            $diafolga    = $pin['dia'];
                                        }  
                                        if($diafolga == $i){  
                                            switch ($tipofolga){
                                                case"sap":
                                                    echo '<td style="background-color:#98FB98;">'.$tipofolga.'</td>';
                                                    break;
                                                case"abo":
                                                    echo '<td style="background-color:#F0E68C;">'.$tipofolga.'</td>';
                                                    break;
                                                case"con":
                                                    echo '<td style="background-color:#ADD8E6;">'.$tipofolga.'</td>';
                                                    break;
                                                case"doa":
                                                    echo '<td style="background-color:#FFB6C1;">'.$tipofolga.'</td>';
                                                    break;
                                                case"ele":
                                                    echo '<td style="background-color:#C0C0C0;">'.$tipofolga.'</td>';
                                                    break;
                                            }
                                        } else {
                                            echo '<td></td>';
                                        } 
                                    } else {
                                        echo '<td></td>';  
                                    }
                                }
                                echo"</tr>";
                            }
                        } else {
                            echo '<p style="text-align:center;">Não há histórico para a o periodo selecionado.</p>';
                        }
                    ?>
                </thead>
                <tbody>

            </table>
        </div>
    </div>    
</div>   
