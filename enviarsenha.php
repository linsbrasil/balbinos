
<div class="container-fluid" id="tas">
    <div class="row ">
        <h3 class="page-header text-center">Reenviar Senha no E-mail</h3>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <!--Inicio do formulário-->
                <form name='formreenvio' method='post' action='<?php echo SITE_URL; ?>/controle/funcionario/senha.php' enctype="" >
                    <!-- area de campos do form -->


                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input id="campo5" type="email" class="form-control" placeholder="Informe o email" aria-describedby="basic-addon1" name='email' value=''required="" autocomplete="off">
                        </div>
                    </div>
                    <br>
                    <div id="actions" class="row text-center">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-primary" onclick="reenvioVazio();">Salvar</a>
                            <a href="index.html" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                </form><!--Fim do Formulário-->
            </div>
        </div>
    </div><!--Fim da linha-->
    <!--<div id="login_space"><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>-->
</div><!--Fim do container-fluid-->
        



