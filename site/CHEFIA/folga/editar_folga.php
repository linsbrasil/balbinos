<?php
    $idfolga = $_GET['idfolga'];
    $idusuario = $_GET['idusuario'];
     
    $usuario = new UsuarioDAO();
    //Nome e Sobrenome do Usuário
    $resultado = $usuario->selecionarUsuario($idusuario);
    foreach ($resultado as $lin){
        $nomeUsuario      = ucfirst($lin['nome']);
        $sobrenomeUsuario = ucfirst($lin['sobrenome']);
    }
    $nomeUsuario .= " ";
    $nomeUsuario .= $sobrenomeUsuario;
    
    //Nome e Sobrenome do Chefe
    $result = $usuario->selecionarUsuario($id_login);
    foreach ($result as $pin){
        $nomeChefe     = ucfirst($pin['nome']);
        $sobrenomeChefe = ucfirst($pin['sobrenome']);
    }
    $chefe = $nomeChefe;
    $chefe .= " ";
    $chefe .= $sobrenomeChefe;
    
    $folga = new FolgaDAO();
    $resultado_folga = $folga->exibirFolga($idfolga);
    foreach ($resultado_folga as $linfolga){
        $datafolga = $linfolga['data'];
        $tipofolga = $linfolga['tipo'];
        $obs       = $linfolga['obs'];
    }
    
        $data = $datafolga;
        $data = explode("-", $data);
        list($Ano, $Mes, $Dia ) = $data;
        //Passando para o formato DD/MM/YYYY
        $dtfolgaformat ="$Dia/$Mes/$Ano";
?>
<div class="container-fluid" id="oro">
    <h3 class="page-header text-center">Alterar data da Folga</h3>
    <div class="col-md-4 col-md-offset-4">
        <!--Inicio do formulário-->
        <form name='cadastro' method='post' action='<?php echo SITE_URL;?>/controle/folga/editar.php' enctype="" >
            <!-- area de campos do form -->  

            <div class="row">
                <div class="form-group col-md-12">
                    <input type='hidden' name='dados[Idchefe]' value='<?php echo $id_login; ?>'required="" class="form-control">
                    <input type='hidden' name='dados[Idfolga]' value='<?php echo $idfolga; ?>'required="" class="form-control">
                    <input type='hidden' name='dados[Chefenome]' value='<?php echo $chefe; ?>'required="" class="form-control">
                    <input type="hidden" name='dados[Data]' value ='<?php echo $datafolga; ?>' required="" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="campo1">Nome do Funcionário</label>
                    <input type='text' readonly="true" name='dados[Usuario]' value='<?php echo $nomeUsuario; ?>'required="" class="form-control text-capitalize">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Data da Folga">Data da Folga</label>
                <input type="date" name='dados[Datanova]' placeholder ='<?php echo $dtfolgaformat; ?>' class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Folga"> Tipo de Folga</label>
                    <select name='dados[Tipo]' class="form-control" autocomplete="off" required="">
                        <?php
                            if(!empty($tipofolga)){
                                switch ($tipofolga){
                                    case 'sap':
                                        echo '<option value="sap" selected="">SAP</option>';
                                        break;
                                    case 'abo':
                                        echo '<option value="abo" selected="">ABONADA</option>';
                                        break;
                                    case 'con':
                                        echo '<option value="con" selected="">CONVOCADA</option>';
                                        break;
                                    case 'doa':
                                        echo '<option value="doa" selected="">DOAÇÃO DE SANGUE</option>';
                                        break;
                                    case 'ele':
                                        echo '<option value="ele" selected="">ELEITORAL</option>';
                                        break;
                                }
                            }
                        ?>
                        <option value="sap">SAP</option> 
                        <option value="abo">ABONADA</option>
                        <option value="con">CONVOCADA</option>
                        <option value="doa">DOAÇÃO DE SANGUE</option>
                        <option value="ele">ELEITORAL</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Observações">Obs:</label>
                    <textarea name='dados[Obs]' value='<?php echo $obs; ?>' placeholder="Caso queira deixar alguma informação" class="form-control"></textarea>
                </div>
            </div>

            <div id="actions" class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="index.html" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form><!--Fim do Formulário-->
    </div>
</div><!--Fim do container-fluid-->



