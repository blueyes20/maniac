<?php
ob_start();
session_start();
require_once ('dll/inyection_sql.php');
require_once ('dll/functions.php');     
nocache();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CASHUBA.COM - LISTA DE TAREAS</title>
<meta name="title" content="Sorteos de revista insidenerja.com" /> 
<meta name="robot" content="index,follow" /> 
<meta name="robots" content="all" /> 
<meta name="language" content="es" /> 
<meta name="author" content="CASHUBA.COM - LISTA DE TAREAS"/> 
<meta name="copyright" content="CASHUBA.COM - LISTA DE TAREAS" />
<link href="css/todo_list.css" rel="stylesheet" type="text/css" media="screen" />

</head>

<body>
<?php
//si existe la sesion identificado redirigimos a gestion.php
if ($_SESSION["autentificado"]=="81a67"){
	header ('Location:todo.php');
	}else{
		header ('Location:login.php');
		}
// si no existe la sesion identificado, redirigimos al login


?>
<?php

?>
</div>
</body>
</html>