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
<title>Editar</title>
</head>

<body>
<?php

//editar-borrar.php?id=1

// me va a venir el id de la tarea y tengo que poder:
// a) editarla
// b) borrarla

extract ($_GET);

// EDITAMOS UNA TAREA
?>
<table width="400" border="1">
  <tr>
    <td>cliente</td>
    <td>
    <!-- me conecto a la bbdd-->
    <!-- consulto los clientes y genero un select con ellos  -->
    <?php
	// sentencia de consulta en bbdd
	/*<?php
					
					$link=conectar();
					
					$query="select * from trabajo where codtra=".$_GET["codtra"];
					
					$resultado=mysql_query($query,$link);
					
					$fila=mysql_fetch_array($resultado);
				?>*/
	
	$consulta="SELECT * FROM tareas WHERE num=".$id;
	$result=consulta_sql($con,$consulta);
	$info=mysqli_fetch_array($result);
	
	//$consulta="SELECT * FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	//$result=consulta_sql($con,$consulta);
	//$con=conectar();
	?>
    
    <!--<select name="cliente" id="id_clientes">-->
    <?php
    SelectAvanzSelecc($con,'tareas','num','cliente','clientes','id_clientes','nombre',$id);
    ?>
  
  </td>
  </tr>
  <tr>
    <td>seccion</td>
    <td>
    <?php
	$consulta="SELECT * FROM categorias";
	$result=consulta_sql($con,$consulta);
	?>
    <select name="clientes" id="clientes">
    
    <?php
	while($info=mysqli_fetch_array($result)){
	echo '<option value="'.$info ['id_categoria'].'">'.$info['categoria'].'</option>';
	}
	echo "</select>";
	?>
    </td>
  </tr>
  <tr>
    <td><p>tarea</p></td>
    <td><textarea name="tarea" cols="30" rows="4"><?php
	$consulta="SELECT * FROM tareas WHERE num=".$id;
	$result=consulta_sql($con,$consulta);
	$a=mysqli_fetch_array($result);
	echo $a['tarea'];
	?>
    </textarea></td>
  </tr>
  <tr>
    <td>importe</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>guardar</td>
  </tr>
</table>
</body>
</html>