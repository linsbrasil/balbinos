<?php  include_once '../../inc/inc.php'; ?>
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
<<<<<<< HEAD
 
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
                    <li><a href="home">Home</a></li>
                    <li><a href="turno">Funcionários</a></li>
                    <li><a href="escala">Escala de Folgas</a></li>
                    <li><a href="http://www.aluguetemporada.com.br" target="_blank">Colônia de Férias</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" id="menu1" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="perfil&idusuario=<?php echo $id_login; ?>"><b>Ver perfil</b></a></li>
=======
        

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
                    <li><a href="home">Home</a></li>
                    <li><a href="turno">Funcionários</a></li>
                    <li><a href="escala_do_mes">Escala do Mês</a></li>
                    <li><a href="agendar_folga">Agendar Folga</a></li>
                    <li><a href="http://www.aluguetemporada.com.br" target="_blank">Colônia de Férias</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" id="menu1" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="perfil&idusuario={$_SESSION['id_login']}"><b>Ver perfil</b></a></li>
>>>>>>> origin/master
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="alterar_senha"><b>Alterar senha</b></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="historico"><b>Histórico</b></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo SITE_URL; ?>/funcoes/logout.php"><b>Sair</b></a></li>
                        </ul>
                    </li>
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
