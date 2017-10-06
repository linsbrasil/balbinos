<?php $titulo = 'Agendar Folgas'?>
<?php $description = 'Agendar folgas'?>
<?php $tags = 'agendar folga do funcionário, alterar folga funcionário, sap, agendar folga sap, agendar folgas usuário, programar folgas'?>
<?php $user = 'Emerson'; ?>
<?php include '../inc/header.php'; ?>
        <div class="container-fluid">
            <div class="row ">
                <h3 class="page-header text-center">Agendar Folga</h3>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <!--Inicio do formulário-->
                        <form name='cadastro' method='post' action='controle/funcionario/cadastrar.php' enctype="" >
                            <!-- area de campos do form -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="campo1">Nome do Funcionário</label>
                                    <input type='text' readonly="true" name='idFuncionario' value='<?php  @$nomeFuncionario; echo $nomeFuncionario; ?>'required="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type='hidden' name='idFuncionario' value='<?php @$idFuncionario; echo $idFuncionario; ?>'required="" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Data da Folga">Data da Folga</label>
                                    <input type='date' name='dataFolga' value=''required="" autocomplete="off" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Folga"> Tipo de Folga</label>
                                    <select name='folga' class="form-control" autocomplete="off" required="">
                                        <option value="sap" selected="">SAP</option> 
                                        <option value="abonada">ABONADA</option>
                                        <option value="convocada">CONVOCADA</option>
                                        <option value="doa">DOAÇÃO DE SANGUE</option>
                                        <option value="eleitoral">ELEITORAL</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Observações">Obs:</label>
                                    <textarea name='obs' value=''required="off" autocomplete="off" class="form-control"></textarea>
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
                </div>
            </div><!--Fim da linha-->
        </div><!--Fim do container-fluid-->
        <br> 
        <div class="container-fluid">   
            <div class="row">
                <h3><marquee direction="left">SAP - Secretaria da Administração Penitenciária de São Paulo.</marquee></h3>
            </div>       
        </div>
        <footer class="container-fluid" id="footer">
            <div class="row text-center">
                <smal id="autor">Desenvolvido por: <a href="#"> Emerson Inácio</a>.</smal>
            </div>    
        </footer>
    </body>
</html>


