<?php
    include_once '../../inc/inc.php';
    if($_POST){
        if(!isset($_POST['dados'])){
            header("location:".SITE_URL."/CHEFIA/erro");
        } else {
            $dados = $_POST['dados'];
            $folga = new FolgaDAO();
            $resultado = $folga->editarFolga($dados);
            if($resultado){
                header("location:".SITE_URL."/CHEFIA/sucesso");
            } else {
                header("location:".SITE_URL."/CHEFIA/erro");
            }
        }
    } else {
        header("location:".SITE_URL."/CHEFIA/erro");
    }
?>

