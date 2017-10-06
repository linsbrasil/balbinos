<div class="container-fluid" id='oro'>
    <?php 
        $folga = new Folga();
        
        //Exibe as folgas sap referente ao ano vigente
        $sap_historico = $folga->exibeSapAno();        
        echo"<h3>Folga SAP</3>";
        if ($sap_historico){
            foreach ($sap_historico as $sap_hist){
                echo $sap_hist['folga'];
            }
        }else{
            echo "<br/>";
            echo " <small>Não há registros.</small>";
        }
        echo"<hr>";
        
        //Exibe as folgas Abonada referente ao ano vigente
        $ab_historico = $folga->exibeAbAno();
        echo"<h3>Folga ABONADA</3>";
        if ($ab_historico){
            foreach ($ab_historico as $ab_hist){
                echo $ab_hist['folga'];
            }
        }else{
            echo "<br/>";
            echo " <small>Não há registros.</small>";
        }
        echo"<hr>";
        
        //Exibe as folgas doação de sangue referente ao ano vigente
        $doa_historico = $folga->exibeDoaAno();
        echo"<h3>Folga DOAÇÃO DE SANGUE</3>";
        if ($doa_historico){
            foreach ($doa_historico as $doa_hist){
                echo $doa_hist['folga'];
            }
        }else{
            echo "<br/>";
            echo " <small>Não há registros.</small>";
        }
        echo"<hr>";
        
        //Exibe as folgas convocadas referente ao ano vigente
        $conv_historico = $folga->exibeConvAno();
        echo"<h3>Folga CONVOCADA</3>";
        if ($conv_historico){
            foreach ($conv_historico as $conv_hist){
                echo $conv_hist['folga'];
            }
        }else{
            echo "<br/>";
            echo " <small>Não há registros.</small>";
        }
        echo"<hr>";
        
        //Exibe as folgas eleitoral referente ao ano vigente
        $ele_historico = $folga->exibeEleitoralAno();
        echo"<h3>Folga ELEITORAL</3>";
        if ($ele_historico){
            foreach ($ele_historico as $ele_hist){
                echo $ele_hist['folga'];
            }
        }else{
            echo "<br/>";
            echo " <small>Não há registros.</small>";
        }
    ?>
</div>
