<?php 
<<<<<<< HEAD
$usuario = new UsuarioDAO();
$resultado = $usuario->selecionarUsuario($id_login);
foreach ($resultado as $lin) {
    $idusuario = $lin['idusuario'];
    $nome = $lin['nome'];
    $sobreNome = $lin['sobrenome'];
    $nascimento = $lin['nascimento'];
    $nascimento = (int) $nascimento;
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
?>
<div class="container-fluid" id='oro'>
    <div id="perfil-main ">
        <br>
        <div id="perfil">
            <h2 class='text-capitalize'><?php echo $nome." ".$sobreNome." Nascimento"; ?></h2>
            <dl class="dl-horizontal">
                <dt>Nome: </dt>
                <dd class='text-capitalize'><?php echo $nome." ".$sobreNome." Nascimento"; ?></dd>
                <dt>Nasc:</dt>
                <dd><?php echo $nascimento; ?></dd>
                <dt>Cpf:</dt>
                <dd><?php echo $cpf; ?></dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>End: </dt>
                <dd class='text-capitalize'><?php echo $endereco; ?></dd>

                <dt >Bairro: </dt>
                <dd class='text-capitalize'><?php echo $bairro; ?></dd>

                <dt>Cidade:</dt>
                <dd class='text-capitalize'><?php echo $cidade." - SP"; ?></dd>
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
                <dd class='text-capitalize'><?php echo $plantao; ?></dd>

                <dt>Cargo:</dt>
                <dd class='text-uppercase'><?php echo $cargo; ?></dd>
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
              <a href="alterar_usuario&idusuario=<?php echo $id_login ?>" class="btn btn-primary">Editar</a>
=======
/*if(!isset($_SESSION['id_login']) || empty($_SESSION['id_login'])){
    header("location:".SITE_URL."/FUNCIONARIO/");
}*/
$usuario = new UsuarioDAO();
$resultado = $usuario->selecionarUsuario($_SESSION['id_login']);
foreach ($resultado as $lin) {
    $idusuario = $lin['idusuario'];
    $nome = $lin['nome'];
    $sobreNome = $lin['sobrenome'];
    $nascimento = $lin['nascimento'];
    $nascimento = (int) $nascimento;
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
?>
<div class="container-fluid" id='oro'>
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
>>>>>>> origin/master
              <a href="usuarios" class="btn btn-default">Voltar</a>
              <a href="#" class="btn btn-warning" title="Definir uma função para este funcionário.">Função</a>
            </div>
        </div>
    </div>
</div>



