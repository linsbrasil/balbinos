<?php
    include_once '../../inc/inc.php';
    if($_GET['idfolga']){
        $Idfolga = $_GET['idfolga'];
        $folga = new FolgaDAO();
        $resultado = $folga->excluirFolga($Idfolga);
        if($resultado){
            header('location:'.SITE_URL.'/CHEFIA/sucesso&result=excluido');
        } else {
            header('location:'.SITE_URL.'/CHEFIA/erro');
        }
    } else {
        header('location:'.SITE_URL.'/CHEFIA/erro');
    }
?>

