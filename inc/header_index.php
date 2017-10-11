<?php  include_once 'inc.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $tags; ?>">
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/jquery.js"></script>
        <script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.js"></script>
        <script language="JavaScript" type="text/javascript" src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
        
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
                    <li><a href="?link=login">Logar</a></li>
                    <li><a href="?link=reenvio_de_senha">Reenviar Senha</a></li><!-- href="?link=reenvio_de_senha" no .htaccess -->
                    <li><a href="http://www.aluguetemporada.com.br" target="_blank">Colônia de Férias</a></li>
                </ul>
            </div>
        </div>
    </nav>
        
    
