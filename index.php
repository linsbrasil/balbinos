
<?php 
    include 'inc/header_index.php';
    
    if(!isset($_GET['link'])){
        include_once 'home.php';
    }else{
        switch ($_GET['link']){
            case 'login':
                include_once 'login.php';
                break;
            case 'reenvio_de_senha':
                include_once 'enviarsenha.php';
                break;
            default:
                include_once 'home.php';
                break;
        }
    }
    include 'inc/footer.php'; 
?>
