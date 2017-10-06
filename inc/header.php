<?php  include_once '../inc/inc.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $tags; ?>">
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/jquery.js"></script>
        <script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.js"></script>
        
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/jquery.maskedinput.js"></script>
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/datahora.js"></script>
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/validasenha.js"></script>
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/mascara.js"></script>
        
        <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/assets/css/estilo.css" media="all">
        <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/awesome/css/font-awesome.min.css">
        

        <script>  
            function hideElement() {
                var janela = window.innerWidth;
                if(janela < 480){
                    document.getElementById("login_space").style.display = "none";
                } else{
                    document.getElementById("login_space").style.display = "block";
                }       
            }
        </script>
    </head>
    <body onload="atualizarDataHora(); hideElement();" >  
    <nav class="navbar navbar-inverse" >
        <div class="container-fluid">
            
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo SITE_URL; ?>/site/home.php">Agendamento de Folgas</a> 
                
                <div id="btnavbar">
                    <a href="#" data-toggle="collapse" data-target=".navbar-collapse" class=""><i class="fa fa-bars fa-2x"></i></a>
                    <!--<button  type="button" data-toggle="collapse" data-target=".navbar-collapse" class="btn btn-default btn-xs "> 
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                    </button>-->
                </div>
                
            </div>
            
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="navbar-nav nav navbar-right">
                    <li><a href="?link=1">Home</a></li>
                    <li><a href="?link=2">Cadastrar</a></li>
                    <li><a href="?link=3">Alterar</a></li>
                    <li><a href="?link=4">Exibir</a></li>
                    <li><a href="?link=5">Reenviar Senha</a></li>
                    <li><a href="#">Deletar</a></li>
                    <li><a href="http://www.aluguetemporada.com.br" target="_blank">Colônia de Férias</a></li>
                </ul>
            </div>
        </div>
    </nav>
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <span style="color:#8c8c8c;"><?php if($user!= '' || $user!= null){ echo'Olá, '.$user.'! ';}?></span>&nbsp;
                <span id="dataextenso"  style="color:#8c8c8c;"></span>
                <span id="horas" style="color:#8c8c8c; font-weight:bold;"></span>
            </div>
        </div>
    </div>