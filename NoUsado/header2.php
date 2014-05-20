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
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="count">4</span>
                        <span class="head-icon head-message"></span>
                        <span class="headmenu-label">Messages</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Messages</li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span> New message from <strong>Jane</strong> <small class="muted"> - 3 days ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span> New message from <strong>Tanya</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span> New message from <strong>Lee</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li class="viewmore"><a href="messages.html">View More Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                        <span class="count">10</span>
                        <span class="head-icon head-users"></span>
                        <span class="headmenu-label">New Users</span>
                    </a>
                    <ul class="dropdown-menu newusers">
                        <li class="nav-header">New Users</li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb1.png" alt="" class="userthumb" />
                                <strong>Draniem Daamul</strong>
                                <small>April 20, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb2.png" alt="" class="userthumb" />
                                <strong>Shamcey Sindilmaca</strong>
                                <small>April 19, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb3.png" alt="" class="userthumb" />
                                <strong>Nusja Paul Nawancali</strong>
                                <small>April 19, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb4.png" alt="" class="userthumb" />
                                <strong>Rose Cerona</strong>
                                <small>April 18, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb5.png" alt="" class="userthumb" />
                                <strong>John Doe</strong>
                                <small>April 16, 2013</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                        <span class="count">1</span>
                        <span class="head-icon head-bar"></span>
                        <span class="headmenu-label">Statistics</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Statistics</li>
                        <li><a href=""><span class="glyphicon glyphicon-align-left"></span> New Reports from <strong>Products</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-align-left"></span> New Statistics from <strong>Users</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-align-left"></span> New Statistics from <strong>Comments</strong> <small class="muted"> - 3 days ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-align-left"></span> Most Popular in <strong>Products</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li><a href=""><span class="glyphicon glyphicon-align-left"></span> Most Viewed in <strong>Blog</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li class="viewmore"><a href="charts.html">View More Statistics</a></li>
                    </ul>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/photos/thumb1.png" alt="" />
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
                                <li><a href="editprofile.html">Editar perfil?</a></li>
                                <li><a href="">Opciones?</a></li>
                                <li><a href="logout.php">Salir</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>