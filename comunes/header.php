<?php
	require_once("dll/config.php");
	require_once("dll/inyection_sql.php");
	require_once("dll/functions.php");
   
    $con=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    
    <title>CASHUBA.COM - LISTA DE TAREAS</title>
    <meta name="title" content="Sorteos de revista insidenerja.com" /> 
    <meta name="robot" content="index,follow" /> 
    <meta name="robots" content="all" /> 
    <meta name="language" content="es" /> 
    <meta name="author" content="CASHUBA.COM - LISTA DE TAREAS"/> 
    <meta name="copyright" content="CASHUBA.COM - LISTA DE TAREAS" />

    <link href='http://fonts.googleapis.com/css?family=Asap:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:700,700italic' rel='stylesheet' type='text/css'>
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

  <!-- CALENDARIO -->
        <link href="calendario/calCss.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript">
function overlay() {
    el = document.getElementById("overlay");
    el.style.display = (el.style.display == "block") ? "none" : "block";
    el = document.getElementById("events");
    el.style.display = (el.style.display == "block") ? "none" : "block";
    el = document.getElementById("eventsBody");
    el.style.display = (el.style.display == "block") ? "none" : "block";
}
</script>
<script type="text/javascript">
    function show_details(theId) {
        var deets = (theId.id);
        el = document.getElementById("overlay");
        el.style.display = (el.style.display == "block") ? "none" : "block";
        el = document.getElementById("events");
        el.style.display = (el.style.display == "block") ? "none" : "block";
        var hr = new XMLHttpRequest();
        var url = "calendario/events.php";
        var vars = "deets="+deets;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                document.getElementById("events").innerHTML = return_data;
            }
        }
        hr.send(vars);
        document.getElementById("events").innerHTML = "processing...";
    }
</script>
<!-- EL VIDEO EXPLICA TRES SCRIPTS PARA IMPLEMENTAR EN EL CALENDARIO
        LOS BOTONES DE MES SIGUIENTE O MES ANTERIOR -->
<script type="text/javascript">
function initialCalendar(){
    var hr = new XMLHttpRequest();
    var url = "calendario/calendar_start.php";
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var year = currentTime.getFullYear();
    showmonth = month;
    showyear = year;
    var vars = "showmonth="+showmonth+"&showyear="+showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
            }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";    
}
</script>

<script type="text/javascript">
function next_month(){
    var nextmonth = showmonth + 1;
    if(nextmonth > 12) {
        nextmonth = 1;
        showyear = showyear + 1;
    }
    showmonth = nextmonth;
    var hr = new XMLHttpRequest();
    var url = "calendario/calendar_start.php";
    var vars = "showmonth="+showmonth+"&showyear="+showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
        if(hr.readyState == 4 && hr.status == 200){
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
        }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
}
</script>

<script type="text/javascript">
function last_month(){

    var lastmonth = showmonth - 1;
    if(lastmonth < 1) {
        lastmonth = 12;
        showyear = showyear - 1;
    }
    showmonth = lastmonth;

    var hr = new XMLHttpRequest();
    var url = "calendario/calendar_start.php";
    var vars = "showmonth="+showmonth+"&showyear="+showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
        }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
}
</script>
  <!-- CALENDARIO -->


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
                    <a class="dropdown-toggle" href="index.php?&sec=mensajes&view=listar-mensajes-no-leidos">
                        <?php
                            #nombre del usuario actual:
                            $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
                            $b=mysqli_query($con,$select); 
                            $matriz=mysqli_fetch_array($b);

                            #Numero de mensajes sin leer
                            $sql = "SELECT * FROM mensajes WHERE para='".$matriz['nombreusu']."' AND leido IS NULL";
                            $res = mysqli_query($con,$sql);
                            $tot = mysqli_num_rows($res);
                        ?>
                        <span class="count"><?=$tot?></span>
                        <span class="head-icon head-message"></span>
                        <span class="headmenu-label">Mensajes</span>
                    </a>
                </li>
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
                                    echo"<li><a href='index.php?&sec=usuarios&view=editar-contrasena&id=".$matriz['codusu']."'>Editar contraseña</a></li>";
                                ?>
                                <li><a href="logout.php">Salir</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>