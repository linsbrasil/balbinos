<?php 
    if(!(isset($_GET['idusuario']))){
        echo "<script>location.href='usuarios';</script>"; 
    }
 
    if(!(empty($_GET['idusuario']))){
        $id = filter_var ( $_GET['idusuario'], FILTER_VALIDATE_INT );
        $usuario = new UsuarioDAO();
        $resultado = $usuario->selecionarUsuario($id);
        foreach ($resultado as $lin){  
           $idusuario = $lin['idusario'];
           $nome = $lin['nome'];
           $sobrenome = $lin['sobrenome'];
           $nasc = strtotime($lin['nascimento']);
           $nascimento = date('d/m/Y', $nasc);
           $email = $lin['email'];
           $cargo = $lin['cargo'];
           $plantao = $lin['plantao'];
        }
    }else{
        echo "<script>location.href='usuarios';</script>";    
    }
?>
<div class="container-fluid">
    <div class="row ">
        <h3 class="page-header text-center">Alterar dados do Usuário</h3>
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <!--Inicio do formulário-->
                <form name='cadastro' method='post' action='<?php echo SITE_URL; ?>/controle/RH/editar.php' enctype="" >
                    <!-- area de campos do form -->
                    <div class="row">
                        <input type="hidden" name='usuario[id]' value='<?php echo $idusuario; ?>' required="" id="campo1">
                        <div class="form-group col-md-12">
                            <label for="campo1">Nome</label>
                            <input type="text" name="usuario[nome]" value='<?php echo $nome; ?>' required="" autofocus="" autocomplete="off" placeholder="Nome" class="form-control" id="campo1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo2">Sobrenome</label>
                            <input type="text"  name="usuario[sobreNome]" value='<?php echo $sobrenome; ?>' required="" autocomplete="off" placeholder=" Sobrenome" class="form-control" id="campo2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo4">Data Nascimento</label>
                            <input type='datetime' name="usuario[nascimento]" value='<?php echo $nascimento; ?>' required="" autocomplete="off" class="form-control" id="campo4">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="campo5">E-mail</label>
                            <input type='email' name="usuario[email]" value='<?php echo $email; ?>'required="" autocomplete="off" placeholder="seu@email" class="form-control" id="campo5">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="cargo">Cargo</label>
                            <select name="usuario[cargo]" class="form-control"  autocomplete="off" required="">
                                <option value="asp" <?php if($cargo == 'asp'){ echo 'selected';} ?> >ASP</option> 
                                <option value="aevp" <?php if($cargo == 'aevp'){ echo 'selected';} ?> >AEVP</option>
                                <option value="oficial" <?php if($cargo == 'oficial'){ echo 'selected';} ?> >OFICIAL ADM</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="plantao">Escala de Trabalho</label>
                            <select name="usuario[plantao]" class="form-control" autocomplete="off" required="">
                                <option value="t1" <?php if($plantao == 't1'){ echo 'selected';} ?> >TURNO I</option> 
                                <option value="t2" <?php if($plantao == 't2'){ echo 'selected';} ?> >TURNO II</option>
                                <option value="t3" <?php if($plantao == 't4'){ echo 'selected';} ?> >TURNO III</option>
                                <option value="t4" <?php if($plantao == 't4'){ echo 'selected';} ?> >TURNO IV</option>
                                <option value="diarista" <?php if($plantao == 'diarista'){ echo 'selected';} ?>>DIARISTA</option>
                            </select>
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



