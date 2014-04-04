<?php
ob_start();
session_start();
require ('dll/config.php');
$_SESSION['mensaje_error']="";
extract($_POST);
if (@$clave==$main_clave){
	$_SESSION["autentificado"]=="81a67";
	header ('Location:todo.php');
	}
	
if (@$clave !=4){
	$_SESSION['mensaje_error']= "Compruebe los datos";
	}	
	
if (@$clave == ""){
	$_SESSION['mensaje_error']= "Introduzca su Clave";
	}	
	
	
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
<link href="css/todo_list.css" rel="stylesheet" type="text/css" media="screen" />


</head>
<body>

<form id="form1" name="form1" method="post" action="#">
<input type="hidden" name="c" id="c" value="1">
<div id="wrapper_login"><br /><br /><br /><div id="login_master"><table width="450" border="0" align="center" cellpadding="3" cellspacing="5" id="login">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><span style="color:#000">Introduce las Clave para Gestionar tu Lista de Tareas</span></td>
    </tr>
  <tr>
    <td width="206" bgcolor="#FFFFFF"><div align="right">Introduce tu Password&nbsp;&nbsp;&nbsp;</div></td>
    <td width="196" align="left" bgcolor="#FFFFFF"><input name="clave" class="input230" type="password" id="clave" value=""/></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#657"><div align="center"  style="color:#fff;"><?php echo $_SESSION["mensaje_error"]; session_destroy();?></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#657"><div align="center">
      
      <input type="submit" class="btnGenerico" name="Submit" id="button" value=" Acceder al panel de Administración " />
      </div></td>
  </tr>
  </table></div>
</div>
</form>
</body>
</html>
