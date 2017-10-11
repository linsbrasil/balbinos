<?php $titulo = 'Consultar por data'?>
<?php $description = 'Visualizar quantidade de folgas por data.'?>
<?php $tags = ''?>
<?php $user = 'Emerson'; ?>
<?php include '../inc/header.php'; ?>
        <div class="container-fluid">
            <div class="row ">
                <h3 class="page-header text-center">Consultar por data</h3>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <!--Inicio do formulário-->
                        <form name='cadastro' method='post' action='controle/funcionario/cadastrar.php' enctype="" >
                            <!-- area de campos do form -->
                    
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Data da Folga">Selecione a Data</label>
                                    <input type='date' name='dataFolga' value=''required="" autocomplete="off" class="form-control">
                                </div>
                            </div>
                           
                            <div id="actions" class="row text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                    <a href="index.html" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form><!--Fim do Formulário-->
                    </div>
                </div>
                <br>
                <div class="text-center"><a href="home.php">Voltar?</a></div>
            </div><!--Fim da linha-->
            <div id="login_space"><br><br><br><br><br><br><br><br><br><br><br><br></div>
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


