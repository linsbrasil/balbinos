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
	</div>
    </div>
</div>



