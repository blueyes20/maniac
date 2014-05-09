<form role="form" method="post" action="index.php?&sec=tareas&view=finsertar">
	
<button class="btn btn-default" type="submit">Insertar Nueva Tarea</button>
</form>
<br/>
<h1 id="titulin">PRIORIDAD CRÍTICA</h1>

<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">SECCIÓN</th>
        <th width="40%" align="center">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,prioridades,categorias WHERE tareas.cliente = clientes.id_clientes AND tareas.prioridad=prioridades.id_prioridad AND tareas.categoria=categorias.id_categoria AND prioridad ='1' AND isdeleted='0'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=tareas&view=editar-borrar&id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=tareas&view=borrar&id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>


<h1 id="titulin">PRIORIDAD MEDIA</h1>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">SECCIÓN</th>
        <th width="40%" align="center">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,prioridades,categorias WHERE tareas.cliente = clientes.id_clientes AND tareas.prioridad=prioridades.id_prioridad AND tareas.categoria=categorias.id_categoria AND prioridad ='2' AND isdeleted='0'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='editar-borrar.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>

<h1 id="titulin">PRIORIDAD BAJA</h1>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">SECCIÓN</th>
        <th width="40%" align="center">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,prioridades,categorias WHERE tareas.cliente = clientes.id_clientes AND tareas.prioridad=prioridades.id_prioridad AND tareas.categoria=categorias.id_categoria AND prioridad ='3' AND isdeleted='0'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='editar-borrar.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>

<h1 id="titulin">PRIORIDAD  MUY BAJA</h1>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">SECCIÓN</th>
        <th width="40%" align="center">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,prioridades,categorias WHERE tareas.cliente = clientes.id_clientes AND tareas.prioridad=prioridades.id_prioridad AND tareas.categoria=categorias.id_categoria AND prioridad ='5' AND isdeleted='0'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='borrar.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>

<h1 id="titulin">PRIORIDAD FIN DE SEMANA</h1>
<div id="tablap">
<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">SECCIÓN</th>
        <th width="40%" align="center">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>
      <?php
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,prioridades,categorias WHERE tareas.cliente = clientes.id_clientes AND tareas.prioridad=prioridades.id_prioridad AND tareas.categoria=categorias.id_categoria AND prioridad ='6' AND isdeleted='0'";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='editar-borrar.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      ?>
    </tbody>
</table>
</div>