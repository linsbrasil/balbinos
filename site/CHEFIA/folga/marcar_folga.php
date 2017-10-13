<?php 
    $idusuario = $_GET['idusuario']; 
    $usuario = new UsuarioDAO();
    $resultado = $usuario->selecionarUsuario($idusuario);
    foreach ($resultado as $lin){
        $nomeUsuario      = ucfirst($lin['nome']);
        $sobrenomeUsuario = ucfirst($lin['sobrenome']);
    }
            
?>
<div class="container-fluid" id="oro">
    <h3 class="page-header text-center">Agendar Folga</h3>
    <div class="col-md-4 col-md-offset-4">
        <!--Inicio do formulário-->
        <form name='cadastro' method='post' action='<?php echo SITE_URL;?>/controle/folga/cadastrar.php' enctype="" >
            <!-- area de campos do form -->  

            <div class="row">
                <div class="form-group col-md-12">
                    <input type='hidden' name='dados[idchefe]' value='<?php echo $id_login; ?>'required="" class="form-control">
                    <input type='hidden' name='dados[idusuario]' value='<?php echo $idusuario; ?>'required="" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="campo1">Nome do Funcionário</label>
                    <input type='text' readonly="true" name='dados[nome]' value='<?php echo $nomeUsuario." ".$sobrenomeUsuario; ?>'required="" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Data da Folga">Data da Folga</label>
                    <input type='date' name='dados[datafolga]' value=''required="" autocomplete="off" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Folga"> Tipo de Folga</label>
                    <select name='dados[tipofolga]' class="form-control" autocomplete="off" required="">
                        <option value="sap" selected="">SAP</option> 
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
                    <textarea name='dados[obs]' value='' placeholder="Caso queira deixar alguma informação" class="form-control"></textarea>
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



