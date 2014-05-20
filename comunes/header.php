<?php
	require_once("dll/config.php");
	require_once("dll/inyection_sql.php");
	require_once("dll/functions.php");
    $con=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CASHUBA.COM - LISTA DE TAREAS</title>
    <meta name="title" content="Sorteos de revista insidenerja.com" /> 
    <meta name="robot" content="index,follow" /> 
    <meta name="robots" content="all" /> 
    <meta name="language" content="es" /> 
    <meta name="author" content="CASHUBA.COM - LISTA DE TAREAS"/> 
    <meta name="copyright" content="CASHUBA.COM - LISTA DE TAREAS" />

    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.default.css" />
    <link rel="stylesheet" href="css/responsive-tables.css">

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery-ui-1.10.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookies.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/flot/jquery.flot.min.js"></script>
    <script src="js/flot/jquery.flot.resize.min.js"></script>
    <script src="js/responsive-tables.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/custom.js"></script>
</head>

<body>
<div id="mainwrapper" class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="right">
                    <div class="userloggedinfo">
                        
                        <div class="userinfo">

                            <!-- Inicio php para saber el usuario que ha iniciado la sesión-->
                            <?php
                                $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
                                $b=mysqli_query($con,$select); 
                                $matriz=mysqli_fetch_array($b);
                                        echo '<h5>'.$matriz['nombreusu'].' <small>- '.$matriz['email'].'</small></h5>';
                            ?>
                            <!-- Fin de los datos del usuario -->

                            <ul>
                                <?php
                                    echo"<li><a href='index.php?&sec=usuarios&view=editar-borrar&id=".$matriz['codusu']."'>Editar perfil</a></li>";
                                ?>
                                <li><a href="logout.php">Salir</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>