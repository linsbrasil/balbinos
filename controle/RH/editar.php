<?php
include_once '../../inc/inc.php';
if($_POST['usuario']){
    $usuario = $_POST['usuario'];
    extract($usuario);
     if(!(isset($plantao)) || 
             !(isset($id)) ||
             !(isset($nome)) ||
             !(isset($sobreNome)) ||
             !(isset($nascimento)) ||
             !(isset($email)) ||  
             !(isset($cargo)))
         {
         header("location:".SITE_URL."/RH/");
     }
    
    if(!(empty($plantao))||
            !(empty($id))||
            !(empty($nome))||
            !(empty($sobreNome))||
            !(empty($nascimento))||
            !(empty($email))||
            !(empty($cargo))){
        //include_once '../../modelo/funcionario/UsuarioDAO.php';
        $usuario = new UsuarioDAO();
        if($usuario->atualizarUsuario($id, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo)){
            header("location:".SITE_URL."/RH/usuarios");
        }else{
            echo"<html><body><div style='text-align: center;'>";
            echo"<2>Não foi possível atualizar este usuário</h2";
            echo"<a href='".SITE_URL."/RH/usuarios'><h3>Voltar</h3></a>";
            echo"</div></body></html>";
        }
    } else {
        echo "Preencha todos os campos do formulário";                  
    }

}else{
    header("location:".SITE_URL."/RH/");
}
?>



