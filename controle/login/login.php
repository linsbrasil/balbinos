

<?php
if($_POST){
    session_start();
    $user = $_POST['login'];
    include_once '../../inc/inc.php'; 
    if(!(isset($user))){
        header("location:".SITE_URL);
    } 
    if(!(empty($user))){
        $login = new LoginDAO();
        $resultado = $login->logar($user);
        if($resultado == true){
            $nivel = $_SESSION['nivel'];
            $ativo = $_SESSION['ativo'];
            if($ativo == 'S'){
                switch ($nivel){
                    case 1:
                        header("location:".SITE_URL."/site/FUNCIONARIO/");
                        break;
                    case 2:
                        header("location:".SITE_URL."/CHEFIA/");
                        break;
                    case 3:
                        header("location:".SITE_URL."/RH/");
                        break;
                    case 4:
                        header("location:".SITE_URL."/DRHU/");
                        break;
                    case 5:
                        header("location:".SITE_URL."/DIRETORIA/");
                        break;
                    case 6:
                        header("location:".SITE_URL."/ADM/");
                        break;
                    default:
                        header("location:".SITE_URL);
                        break;
                }
            }else{
                echo 'Emerson';
                //header("location:".SITE_URL);
            }
        }else{
            header("location:".SITE_URL."/?link=login&pg=15");
        }     
    }else {
        header("location:".SITE_URL);
    }
}else{
    echo "Dados não foram enviados via post";
}
?>

