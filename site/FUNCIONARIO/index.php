<?php
include_once '../../inc/inc.php';
session_start();
<<<<<<< HEAD

    /*
    if(!isset($_SESSION['id_login']) && !isset($_SESSION['nome_login'])  && !isset($_SESSION['email_login']) && !isset($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if(empty($_SESSION['id_login']) && empty($_SESSION['nome_login'])  && empty($_SESSION['email_login']) && empty($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if($_SESSION['nivel_login'] != 1){
        header("location:".SITE_URL);
    }
    $email_login = $_SESSION['email_login'];*/
    $id_login = $_SESSION['id_login']=7 ;
    $idunidade_login = $_SESSION['idunidade_login']=1;
    $cargo_login = $_SESSION['cargo_login']='asp';
    $turno_login = $_SESSION['turno_login']='t2';
     
    if(empty($_SESSION['nome_login'])){
        $user ='usuário';  
    }else{
        $user = $_SESSION['nome_login'];
    }
?>
<?php
    switch ($_GET['link']){
    case 'home':
        $_SESSION['titulo'] = 'Usuário';
        $_SESSION['description'] = 'Área restrita ao funcionário logado';
        $_SESSION['tags'] = 'funcionário, sap, usuário, folgas';
        break;
    case 'meu_perfil':
        $_SESSION['titulo'] = 'Perfil do usuário';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
        break;
    case 'historico':
        $_SESSION['titulo'] = 'Folgas anteriores';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
        break;
    case 'alterar_senha':
        $_SESSION['titulo'] = 'Alterar senha';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
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

?>

<?php include 'header.php'; ?>


<?php 
    if(!isset($_GET['link'])){
        include_once 'home.php';
    }else{
        switch ($_GET['link']){
            case 'home':
                include_once 'home.php';
                break;
            case 'historico':
                include_once 'funcionario/historico.php';
                break;
            case 'alterar_senha':
                include_once 'funcionario/alterarsenha.php';
                break;
             case 'perfil':
                include_once 'funcionario/perfil.php';
                break;
            case 'escala':
                include_once 'folga/escala.php';
                break;
            case 'escala_historico':
                include_once 'folga/escala_historico.php';
=======
include_once '../../inc/inc.php';
    /*session_start();
    if(!isset($_SESSION['id_login']) && !isset($_SESSION['nome_login'])  && !isset($_SESSION['email_login']) && !isset($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if(empty($_SESSION['id_login']) && empty($_SESSION['nome_login'])  && empty($_SESSION['email_login']) && empty($_SESSION['nivel_login'])){
        header("location:".SITE_URL);
    }
    if($_SESSION['nivel_login'] != 1){
        header("location:".SITE_URL);
    }
    $id_login = $_SESSION['id_login'];
    $email_login = $_SESSION['email_login'];*/

?>
<?php
    switch ($_GET['link']){
    case 'home':
        $_SESSION['titulo'] = 'Usuário';
        $_SESSION['description'] = 'Área restrita ao funcionário logado';
        $_SESSION['tags'] = 'funcionário, sap, usuário, folgas';
        break;
    case 'meu_perfil':
        $_SESSION['titulo'] = 'Perfil do usuário';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
        break;
    case 'historico':
        $_SESSION['titulo'] = 'Folgas anteriores';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
        break;
    case 'alterar_senha':
        $_SESSION['titulo'] = 'Alterar senha';
        $_SESSION['description'] = '';
        $_SESSION['tags'] = '';
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

<?php include 'header.php'; ?>


<?php 
    if(!isset($_GET['link'])){
        include_once 'home.php';
    }else{
        switch ($_GET['link']){
            case 'home':
                include_once 'home.php';
                break;
            case 'historico':
                include_once 'funcionario/historico.php';
                break;
            case 'alterar_senha':
                include_once 'funcionario/alterarsenha.php';
                break;
             case 'perfil':
                include_once 'funcionario/perfil.php';
>>>>>>> origin/master
                break;
            default:
                include_once 'home.php';
                break;
        }
    }
?>


<?php include '../../inc/footer.php'; ?>
