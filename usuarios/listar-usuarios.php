<form role="form" method="post" action="index.php?&sec=usuarios&view=finsertar">
	
<button class="btn btn-default" type="submit">Insertar Nuevo Usuario</button>
</form>
<br/>
<h1 id="titulin">Listado de usuarios</h1>
<br/>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
    
        <th width="15%" align="center">USUARIO</th>
        <th width="15%" align="center">EMAIL</th>
        <th width="15%" align="center">TELÉFONO</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM usuarios";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['codusu'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombreusu'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['email'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['telef'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=usuarios&view=editar-borrar&id=".$info['codusu']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=usuarios&view=borrar&id=".$info['codusu']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>