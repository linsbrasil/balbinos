<?php
    include_once '../../inc/inc.php';
    if($_POST){
        if(!isset($_POST['dados'])){
            header('location:'.SITE_URL.'/CHEFIA/erro');
        } else {
            $dados = $_POST['dados'];
            extract($dados);
            $folga = new FolgaDAO();
            $resultado = $folga->cadastrarFolga($dados);
            if($resultado == 'ok'){
                header('location:'.SITE_URL.'/CHEFIA/sucesso&result='.$Tipo);
            } else {
                
                header('location:'.SITE_URL.'/CHEFIA/erro&result='.$resultado);
            }
        }
    } else {
        header('location:'.SITE_URL.'/CHEFIA/erro');
    }
?>

