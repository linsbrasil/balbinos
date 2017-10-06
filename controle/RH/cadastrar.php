<?php
    include_once '../../inc/inc.php';
    if($_POST['usuario']){
        session_start();
        $usuario = $_POST['usuario'];
        extract($usuario);
        $unidade = $_SESSION['unidade'];
        if(!(isset($plantao)) ||
            !(isset($nome)) ||
            !(isset($sobreNome)) ||
            !(isset($nascimento)) ||
            !(isset($email)) || 
            !(isset($unidade)) ||
            !(isset($cargo))){
                header("location:".SITE_URL."/RH/usuarios");
        }

        if(!(empty($plantao))||
            !(empty($nome))||
            !(empty($sobreNome))||
            !(empty($nascimento))||
            !(empty($email))||
            !(empty($unidade)) ||
            !(empty($cargo))){
            //include_once '../../modelo/funcionario/UsuarioDAO.php';
            $usuario = new UsuarioDAO();
            echo $usuario->cadastrarUsuario($unidade, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo);
            header("location:".SITE_URL."/RH/usuarios");
        } else { 
            header("location:".SITE_URL."/RH/usuarios");
        }
    }else{
        header("location:".SITE_URL."/RH/"); 
    }
?>

