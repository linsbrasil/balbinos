
<div class="container-fluid" id="oro">
    <div class="row ">
        <h3 class="page-header text-center">Cadastrar Usuário</h3>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <!--Inicio do formulário--> 
                <form name='cadastro' method='post' action='<?php echo SITE_URL; ?>/controle/RH/cadastrar.php' enctype="" >
                    <!-- area de campos do form -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo1">Nome</label>
                            <input type="text" name='usuario[nome]' value='' required="" autofocus="" autocomplete="off" placeholder="Nome" class="form-control" id="campo1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo2">Sobrenome</label>
                            <input type="text"  name='usuario[sobreNome]' value='' required="" autocomplete="off" placeholder=" Sobrenome" class="form-control" id="campo2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo4">Data Nascimento</label>
                            <input type='date' name='usuario[nascimento]' value='' required="" autocomplete="off" class="form-control" id="dtnasc" pattern="\d(2)/?\d(2)/?\d(2)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo5">E-mail</label>
                            <input type='email' name='usuario[email]' value=''required="" autocomplete="off" placeholder="seu@email" class="form-control" id="campo5">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="cargo">Cargo</label>
                            <select name='usuario[cargo]' class="form-control" required="" autocomplete="off">                                   
                                <option value="asp" selected>ASP</option> 
                                <option value="aevp" >AEVP</option>
                                <option value="administrativo">ADMINISTRATIVO</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="plantao">Escala de Trabalho</label>
                            <select name='usuario[plantao]' class="form-control" required=""autocomplete="off">
                                <option value="t1">TURNO I</option> 
                                <option value="t2">TURNO II</option>
                                <option value="t3">TURNO III</option>
                                <option value="t4">TURNO IV</option>
                                <option value="diarista" selected="">DIARISTA</option>
                            </select>
                        </div>
                    </div>

                    <div id="actions" class="row text-center">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" onclick="return cadastroVazio();" value="Salvar">
                            <a href="index.html" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>   
                </form><!--Fim do Formulário-->
            </div>
        </div>
    </div><!--Fim da linha-->
</div><!--Fim do container-fluid-->
         
        
       


