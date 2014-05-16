<?php 
 //Crear sesión
 session_start();
 //Destruir Sesión
 session_destroy();
 //Redireccionar a login.php
 header("location: index.php");
 exit();
?>