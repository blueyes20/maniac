<?php
require_once("dll/config.php");
require_once("dll/inyection_sql.php");
require_once("dll/functions.php");

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

</head>
<body>
<div id="wrapper">
    <div id="cabecera">
    <div id="logo"><a href="todo.php"><img src="images/logo.png" border="0" /></a></div>
    <div id="header_botones"><img src="images/nueva_tarea.png" width="328" height="68" /><img src="images/categorias.png" width="328" height="68" /></div>
    </div>
    <div id="content">
<h1>TAREAS DE PRIORIDAD CRÍTICA</h1>

<table width="100%" border="0" class="display datatable">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="10%" align="center">SECCIÓN</th>
        <th width="45%" align="left">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="5%" align="center">MÁS</th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='editar-borrar.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>

<table width="100%" border="1" class="display datatable">
  <tbody>
    
  </tbody>
  
</table>




<?php



//   $du = new C_DataGrid("SELECT num, fecha as FECHA, prioridad as PRIORIDAD, tarea as TAREA FROM tareas", "num", "tareas";	//$du -> set_dimension(964, 600);;	$du -> set_col_property("num", array("num"=>"Order Number", "width"=>25));;	$du -> set_col_property("FECHA", array("fecha"=>"Order Number", "width"=>35));
//	$du -> set_col_property("PRIORIDAD", array("num"=>"Order Number", "width"=>35));
//	$du -> set_col_date("FECHA", "Y-m-d ", "j/n/Y", "yy-mm-dd");
//	$du -> display();  

?>    
    
    </div>

</div>


</body>
</html>
