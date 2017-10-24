<div class="container-fluid" id='oro'>
    <div class="row ">
        <h3 class="page-header text-center">Alterar Senha de Usuário</h3>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <!--Inicio do formulário-->
                <form name='cadastro' method='post' action='<?php echo SITE_URL ?>/controle/funcionario/alterar_senha.php' enctype="" >
                    <!-- area de campos do form -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type='hidden' name='senha[id]' value='<?php echo $id_login; ?>'required=""  class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type='hidden' name='senha[email]' value='<?php echo $email_login; ?>' class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="senha">Senha Atual</label>
                            <input type='password' name='senha[senha]' value='' placeholder="********" required="" autocomplete="off" class="form-control" id="senha">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="senha">Nova Senha</label>
                            <input type='password' name='senha[novaSenha]' value='' placeholder="********" required="" autocomplete="off" class="form-control" id="senha">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="repeteSenha">Repete Nova Senha</label>
                            <input type='password' name='senha[repeteSenha]' value='' placeholder="********" required="" autocomplete="off"  onBlur="return verificaSenha()" class="form-control" id="repeteSenha">
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



