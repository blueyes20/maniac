<?php
ob_start();
//session_start();
require ('dll/config.php');	
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

<link rel="stylesheet" href="css/style.default.css" type="text/css" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/modernizr.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/custom.js"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' || p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>

</head>

<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        
        <div id="fondologin">
        <div class="logo animate0 bounceIn"><img src="images/logo.png" alt="" /></div>
        
        
        <form id="login" action="usuarios/comprobar.php" method="post">
            
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Contraseña o nombre de usuario incorrectos</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Introduce tu nombre de usuario" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Introduce tu contraseña" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Acceder</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <!--<div class="pull-right">¿No eres usuario?<a href="registration.html"> Regístrate</a></div>-->
                <label><input type="checkbox" class="remember" name="signin" />No cerrar sesión</label>
            </div>
            
        </form>
        </div><!--fincapalogin-->
    
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014 MANIAC. Todos los derechos reservados</p>
</div>

</body>
</html>
