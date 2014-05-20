<?php 
 //Crear sesión
 session_start();
 session_unset();
 //Destruir Sesión
 session_destroy();
 //Redireccionar a login.php
 header("location: login.php");
?>