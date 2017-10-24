<?php 
    if (!(isset($_GET['idusuario']))){
        echo "<script>location.href='usuarios';</script>";
    }else{
        //include_once '../../modelo/funcionario/UsuarioDAO.php';
        $usuario = new UsuarioDAO();
        $resultado = $usuario->selecionarUsuario($_GET['idusuario']);
        foreach ($resultado as $lin){ 
            $idusuario = $lin['idusuario'];
            $nome = $lin['nome'];
            $sobreNome = $lin['sobrenome'];
            $nascimento = $lin['nascimento'];
            $nascimento = (int)$nascimento;
            $nascimento = date('d/m/Y', $nascimento);
            $email = $lin['email'];
            $cargo = $lin['cargo'];
            $plantao = $lin['plantao'];
            $cpf = $lin['cpf'];
            $endereco = $lin['endereco'];
            $bairro = $lin['bairro'];
            $cidade = $lin['cidade'];
            $cep = $lin['cep'];
            $fone = $lin['fone'];
            $funcao = $lin['funcao'];
        }
    }
?>
<div class="container-fluid" id="oro">
<<<<<<< HEAD
    <div id="perfil-main">
        <br>
        <div class="container" id="perfil">
            <div class="row" style="padding-left: 30px;">
                <h3 class='perfil-texto'><?php echo $nome." ".$sobreNome." Nascimento"; ?></h3>
            </div>
            <hr>
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                        <b class='perfil-texto'>Nome:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $nome." ".$sobreNome." Nascimento"; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Nasc:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $nascimento; ?>
                    </div>
                </div>

                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Cpf:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $cpf; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>End:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $endereco; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Bairro:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $bairro; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Cidade:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $cidade; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Cep:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $cep; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>E-mail:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $email; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Telefone:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $fone; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Turno:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $plantao; ?>
                    </div>
                </div>
                <!--  -->
                <div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                    <div class="col-sm-2">
                      <b class='perfil-texto'>Cargo:</b>
                    </div>
                    <div class="col-sm-10">
                      <?php echo $cargo; ?>
                    </div>
                </div>
                <?php 
                    if(!(empty($funcao))){
                        echo '<div class="row" style="margin: 0 auto;padding-bottom: 5px;">
                                <div class="col-sm-2">
                                    <b class="perfil-texto">Função:</b>
                                </div>
                                <div class="col-sm-10">
                                    <b>'.$funcao.'</b>
                                </div>
                               </div>';
                    }
                ?>
            
        </div><!-- fim da div perfil -->
        <br>

        <div id="perfil-actions" class="row text-center">
            <div class="col-md-12 " >
              <a href="editar_usuario&idusuario=<?php echo $idusuario ?>" class="btn btn-primary">Editar</a>
              <a href="#" class="btn btn-warning" title="Definir uma função para este funcionário.">Permissões</a>
              <a href="usuarios" class="btn btn-default">Voltar</a>
=======
    <div id="perfil-main ">
        <br>
        <div id="perfil">
            <h2><?php echo $nome." ".$sobreNome." Nascimento"; ?></h2>
            <dl class="dl-horizontal">
                <dt>Nome: </dt>
                <dd><?php echo $nome." ".$sobreNome." Nascimento"; ?></dd>
                <dt>Nasc:</dt>
                <dd><?php echo $nascimento; ?></dd>
                <dt>Cpf:</dt>
                <dd><?php echo $cpf; ?></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>End: </dt>
                <dd><?php echo $endereco; ?></dd>

                <dt>Bairro: </dt>
                <dd><?php echo $bairro; ?></dd>

                <dt>Cidade:</dt>
                <dd><?php echo $cidade." - SP"; ?></dd>
                <dt>Cep:</dt>
                <dd><?php echo $cep; ?></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>E-mail:</dt>
                <dd><?php echo $email; ?></dd>
                <dt>Telefone:</dt>
                <dd><?php echo $fone; ?></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Plantão:</dt>
                <dd><?php echo $plantao; ?></dd>

                <dt>Cargo:</dt>
                <dd><?php echo $cargo; ?></dd>
                <?php 
                    if(!(empty($funcao))){
                        echo "
                            <dt>Função:</dt>
                            <dd id='funcao'><b>{$funcao}</b></dd>
                        ";
                    }
                ?>
            </dl>
        </div><!-- fim da div perfil -->
        <br>

        <div id="perfil-actions" class="row text-center">
            <div class="col-md-12 " >
              <a href="alterar_usuario&idusuario=<?php echo $idusuario ?>" class="btn btn-primary">Editar</a>
              <a href="usuarios" class="btn btn-default">Voltar</a>
              <a href="#" class="btn btn-warning" title="Definir uma função para este funcionário.">Função</a>
>>>>>>> origin/master
            </div>
        </div>
    </div>
</div>



