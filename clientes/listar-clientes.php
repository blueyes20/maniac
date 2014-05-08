<form role="form" method="post" action="index.php?&sec=clientes&view=finsertar">
<button class="btn btn-default" type="submit">Insertar Nuevo Cliente</button>
</form>
<br/>
<h1 id="titulin">Listado de clientes</h1>
<br/>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
    
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">TELÉFONO</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM clientes WHERE isborrado=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id_clientes'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['telefono'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=clientes&view=editar-borrar&id=".$info['id_clientes']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=clientes&view=borrar&id=".$info['id_clientes']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>


</div>