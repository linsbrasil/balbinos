<?php
//include_once '../../inc/inc.php';
if($_POST){
    $email = $_POST['email'];
    if(!isset($email)){
        header("location:".SITE_URL);
    } 
    if(!(empty($email))){
        //include_once '../../modelo/funcionario/UsuarioDAO.php';
        $usuario = new UsuarioDAO();
        if($usuario->novaSenha($email)){
            header("location:".SITE_URL."/reenvio.php");
        }else{
            header("location:".SITE_URL);
        }     
    }else {
        header("location:".SITE_URL);
    }
}else{
    header("location:".SITE_URL); 
}

?>
