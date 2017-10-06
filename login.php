       
<div class="container-fluid" id="tas">
            
    <div class="row ">
        <h3 class="page-header text-center">Área de Login</h3>
        <div class="col-md-12">

            <div class="col-md-4 col-md-offset-4">
                <!--Inicio do formulário-->
                <form name="formlogin" id="formlogin" action="<?php echo SITE_URL;?>/controle/login/login.php" method="POST" enctype="multipart/form-data">

                    <!-- area de campos do form -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="email">Login</label>
                            <input type="email" name="login[email]" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="senha">Senha</label>
                            <input type="password" name="login[senha]" class="form-control" autocomplete="off" minlength="8" maxlength="20">
                        </div>
                    </div>
                    

                    <div id="actions" class="row text-center">
                        <div class="col-md-12">
                            <!--<a href="#" class="btn btn-primary" id="btnlogin" onclick="loginVazio();">Logar</a>-->
                            <button type="submit" class="btn btn-primary" id="btnlogin" onclick=" return loginVazio();">Logar</button>
                            <a href="index.html" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>

                </form>

                <!--Fim do Formulário-->


                    <!-- Inicio do Toast Login -->
                    <div id="toast-login" class="info-login">
                        <p id="login-note"> Usuário não encontrado. </p>
                    </div
                    <!-- Fim do Toast Login -->


            </div>

        </div>
        <div class="text-center"><a href="reenvio_de_senha">Esqueceu sua senha?</a></div>
    </div>
            
            
            
            <!--<div id="login_space"><br><br><br><br><br><br><br><br><br></div>-->
</div>
       
