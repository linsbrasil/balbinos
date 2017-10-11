<?php 
 
  if (isset($_GET['id'])){
      include_once '../../inc/inc.php';
      //include_once '../../modelo/funcionario/UsuarioDAO.php';
      $usuario = new UsuarioDAO();
      $usuario->excluirUsuario($_GET['id']);
      header("location:".SITE_URL."/RH/usuarios");  
      
      
  } else {
    die("ERRO: ID não definido.");
  }
?>
