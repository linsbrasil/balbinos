<<<<<<< HEAD
<?php 
include_once '../../inc/inc.php';
session_start();
   /* 
    if(!isset($_SESSION['id_login']) && !isset($_SESSION['nome_login'])  && !isset($_SESSION['email_login']) && !isset($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if(empty($_SESSION['id_login']) && empty($_SESSION['nome_login'])  && empty($_SESSION['email_login']) && empty($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if($_SESSION['nivel_login'] != 2){
        header("location:".SITE_URL);
    }*/
    $idunidade_login = $_SESSION['idunidade_login']=1;
    $id_login = $_SESSION['id_login']=1;
    $email_login = $_SESSION['email_login'];   
    $cargo_login = $_SESSION['cargo_login']='asp';
    $turno_login = $_SESSION['turno_login']='t2';

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
if(empty($_SESSION['nome_login'])){
  $user ='usuário';  
}else{
    $user = $_SESSION['nome_nome'];
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
            case 'turno':
                include_once 'funcionario/selecionar_turno.php';
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
            case 'escala':
                include_once 'folga/escala.php';
                break;
            case 'acao':
                include_once 'folga/acao.php';
                break;
            case 'cadastrar_folga':
                include_once 'folga/cadastrar_folga.php';
                break;
            case 'editar_folga':
                include_once 'folga/editar_folga.php';
                break;
            case 'erro':
                include_once 'folga/erro.php';
                break;
            case 'sucesso':
                include_once 'folga/sucesso.php';
=======
<div id='index'>
<?php 
include_once '../../inc/inc.php';
session_start();
include_once '../../inc/inc.php';
   /* session_start();
    if(!isset($_SESSION['id_login']) && !isset($_SESSION['nome_login'])  && !isset($_SESSION['email_login']) && !isset($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if(empty($_SESSION['id_login']) && empty($_SESSION['nome_login'])  && empty($_SESSION['email_login']) && empty($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if($_SESSION['nivel_login'] != 2){
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
            case 'turno':
                include_once 'funcionario/selecionar_turno.php';
                break;
            case 'alterar_senha':
                include_once '../FUNCIONARIO/funcionario/alterarsenha.php';
                break;
            case 'perfil':
                include_once 'funcionario/perfil.php';
                break;
            case 'historico':
                include_once '../FUNCIONARIO/funcionario/historico.php';
>>>>>>> origin/master
                break;
           default:
                include_once 'home.php';
                break;
        }
    }
?>

<?php include_once 'funcionario/modal.php'; ?>
</div>

<?php include '../../inc/footer.php'; ?>
