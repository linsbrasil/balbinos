<?php 
include_once '../../inc/inc.php';
session_start();
    /*session_start();
    if(!isset($_SESSION['id_login']) && !isset($_SESSION['nome_login'])  && !isset($_SESSION['email_login']) && !isset($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if(empty($_SESSION['id_login']) && empty($_SESSION['nome_login'])  && empty($_SESSION['email_login']) && empty($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if($_SESSION['nivel_login'] != 4 || $_SESSION['nivel_login'] != 5 ){
        header("location:".SITE_URL);
    }
    $id_login = $_SESSION['id_login'];
    $email_login = $_SESSION['email_login'];*/

switch ($_GET['link']){
    case 'home':
        $_SESSION['titulo'] = 'Depto Pessoal';
        $_SESSION['description'] = 'Departamento pessoal';
        $_SESSION['tags'] = 'Departamento pessoal, cadastrar funcionário, funcionário, atualizar funcionário, sap, novo usuário';
        break;
    case 'cadastrar_usuario':
        $_SESSION['titulo'] = 'Cadastrar Usuário';
        $_SESSION['description'] = 'Inserir novo usuário na agenda de controle de folgas';
        $_SESSION['tags'] = 'cadastrar funcionário, incluir funcionário, sap, novo usuário sap';
        break;
    case 'usuarios':
        $_SESSION['titulo'] = 'Funcionários';
        $_SESSION['description'] = 'Ver todos os usuário da agenda de controle de folgas';
        $_SESSION['tags'] = 'lista de funcionários, funcionários, sap, usuários sap';
        break;
}
if(empty($_SESSION['titulo'])){
   $titulo = 'Depto Pessoal'; 
}else{
   $titulo = $_SESSION['titulo'];
}
if(empty($_SESSION['unidade'])){
   $description = $_SESSION['description']; 
}else{
   $unidade = $_SESSION['unidade'];
   $description = $_SESSION['description']; 
   $description .=" de ".$unidade;
}
if(empty($_SESSION['tags'])){
   $tags = 'sap';
} else {
   $tags = $_SESSION['tags']; 
}
if(empty($_SESSION['nome'])){
  $user ='usuário';  
}else{
    $user = $_SESSION['nome'];
}
?>

<?php
    include 'header.php'; 
?>


<?php 
    if(!isset($_GET['link'])){
        include_once 'home.php';
    }else{
        switch ($_GET['link']){
            case 'home':
                include_once 'home.php';
                break;
            case 'quadro':
                include_once 'funcionario/quadro.php';
                break;
            case 'selecionar':
                include_once 'funcionario/selecionar.php';
                break;
            case 'alterar_senha':
                include_once '../FUNCIONARIO/funcionario/alterarsenha.php';
                break;
            case 'perfil':
                include_once 'funcionario/perfil.php';
                break;
            case 'historico':
                include_once '../FUNCIONARIO/funcionario/historico.php';
                break;
           default:
                include_once 'home.php';
                break;
        }
    }
?>

<?php include_once 'funcionario/modal.php'; ?>

<?php include '../../inc/footer.php'; ?>
