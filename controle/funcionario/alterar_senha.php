<?php
include_once '../../inc/inc.php';
if($_POST){
    if(!isset($_POST['senha']) || empty($_POST['senha'])){
        header("location:".SITE_URL."/FUNCIONARIO/");
    }else{
        $senha = $_POST['senha'];
        $usuario = new UsuarioDAO();
        extract($senha);
        if($novaSenha === $repeteSenha){
            if($usuario->alterarSenha($id, $email, $senha, $novaSenha)){
                header("location:".SITE_URL."/FUNCIONARIO/funcionario/sucesso.php"); 
            }else{
                header("location:".SITE_URL."/FUNCIONARIO/funcionario/falha.php");
            }
        }
    }
    
    
}else{
    header("location:".SITE_URL."/FUNCIONARIO/");
}
?>
