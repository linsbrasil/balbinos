
<div class="container-fluid ">
    <?php
        $funcionario = new UsuarioDAO();
        $idunidade = $_SESSION['idunidade'];
        $resultado = $funcionario->selecionarTudoRH($idunidade);
    ?>
<<<<<<< HEAD
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
    </div> <!-- /#top -->
    <br>  
    <div class="container-fluid">
=======

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
        </div> <!-- /#top -->
        <br>  

>>>>>>> origin/master
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
                if($resultado){
                    foreach ($resultado as $lin){ 
                        echo"<tr>
                            <th>{$lin['idusuario']}</th>
                            <td>{$lin['nome']}</td>
                            <td>{$lin['email']}</td>
                            <td>{$lin['cargo']}</td>
                            <td>{$lin['plantao']}</td>
                            <td><a href='perfil&idusuario={$lin['idusuario']}' class='btn btn-success btn-sm col-md-12'>Visualizar</a></td>
                            <td><a href='editar_usuario&idusuario={$lin['idusuario']}' class='btn btn-warning btn-sm col-md-12'>Editar</a></td>
                            <td><a onclick='excluir();' href='#' class='btn btn-danger btn-sm col-md-12 delete' data-toggle='modal' data-target='#delete-modal' data-funcionario='{$lin['idusuario']}' >Excluir</a></td>
                        </tr>";
                    }
                }else{
                    echo $resultado;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>           
</div>
