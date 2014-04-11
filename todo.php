<?php
require_once("dll/config.php");
require_once("dll/inyection_sql.php");
require_once("dll/functions.php");
$con=conectar();
extract ($_GET);
if (isset($del)){
	Delete_Recup($con,"tareas","num","isdeleted",$id,$del);
	header("Location:todo.php");
}
// si existe por get el id de algo es que se quiere editar
//mostramos un formulario mini para editar.


// si por get viene la variable id y la variable del=1
// el usuario quiere marcar la tarea como realizada esto se hace poniendo isdelete=1 en la base de datos.

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

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

</head>

<body>
<div id="wrapper">
    <div id="cabecera">
    <div id="logo"><a href="todo.php"><img src="images/logo.png" border="0" /></a></div>
    <div id="header_botones"><img src="images/nueva_tarea.png" width="328" height="68" /><img src="images/categorias.png" width="328" height="68" /></div>
    </div>
    
    <div id="content">
 
    
			<?php
				$menu= ' ';
				$content= ' ';
				
				$num="SELECT * FROM prioridades";
				$envio1=mysqli_query($con,$num);
				
					$menu .= '<ul>';
					while($prioridades=mysqli_fetch_assoc($envio1)){
						
						$menu .= '<li><a href="#tabs-'.$prioridades["id_prioridad"].'">'.$prioridades["nombre_prioridad"].'</a></li>';
						$content .=' <div id="tabs-'.$prioridades["id_prioridad"].'"><p>'.$prioridades["id_prioridad"].'</p></div>';
					
					}
					
					$menu .='</ul>';
					
					echo '<div id="tabs">'.$menu,$content.'</div>';
				
			?>
			</div>

	</div>

</div>

</body>

</html>