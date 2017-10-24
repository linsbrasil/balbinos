
<div class="container-fluid " id='oro'>

    <?php
<<<<<<< HEAD
        $funcionario = new UsuarioDAO();
        $idunidade = 1;//$_SESSION['idunidade'];
        $cargo = 'asp';//$_SESSION['cargo'];
        $plantao = 't2';// $_SESSION['plantao'];
        $resultado = $funcionario->selecionarTurno($idunidade, $cargo, $plantao);
    ?>

    <div id="top" class="container-fluid">
        <div class="col-md-3">
            <h2>Funcionários</h2>
        </div>

        <div class="col-md-6">
            <div class="input-group h2">
                <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
        </div>

        <div class="col-md-3">
            <a href="cadastrar_usuario" class="btn btn-primary pull-right h2">Inserir Novo</a><!-- href="?link=cadastrar_usuario" no .htaccess -->
        </div>
    </div> <!-- /#top -->
    <br>
    
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Plantão</th>
                        <th><i class="fa fa-search"></i></th>                       
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($resultado as $lin){ 
                        echo"<tr>
                            <th>{$lin['idusuario']}</th>
                            <td class='text-capitalize'>{$lin['nome']}</td>
                            <td>{$lin['email']}</td>
                            <td class='text-uppercase'>{$lin['cargo']}</td>
                            <td class='text-uppercase'>{$lin['turno']}</td>
                            <td><a href='perfil&idusuario={$lin['idusuario']}' class='btn btn-success btn-sm col-md-12'>Visualizar</a></td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div> 
    </div>
=======
        include_once '../../modelo/funcionario/UsuarioDAO.php';
        $funcionario = new UsuarioDAO();
        $idunidade = 1;//$_SESSION['idunidade'];
        $cargo = 'asp';//$_SESSION['cargo'];
        $plantao = 't2';// $_SESSION['plantao'];
        $resultado = $funcionario->selecionarPlantaoChefia($idunidade, $cargo, $plantao);
    ?>


    <div class="container">

        <div id="top" class="row">
            <div class="col-md-3">
                <h2>Funcionários</h2>
            </div>

            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
            </div>

            <div class="col-md-3">
                <a href="cadastrar_usuario" class="btn btn-primary pull-right h2">Inserir Novo</a><!-- href="?link=cadastrar_usuario" no .htaccess -->
            </div>
        </div> <!-- /#top -->
        <br>  

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Plantão</th>
                        <th><i class="fa fa-search"></i></th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($resultado as $lin){ 
                        echo"<tr>
                            <th>{$lin['idusuario']}</th>
                            <td>{$lin['nome']}</td>
                            <td>{$lin['email']}</td>
                            <td>{$lin['cargo']}</td>
                            <td>{$lin['plantao']}</td>
                            <td><a href='perfil&idusuario={$lin['idusuario']}' class='btn btn-success btn-sm col-md-12'>Visualizar</a></td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>           
>>>>>>> origin/master
</div>
