<form role="form" method="post" action="index.php?&sec=calendario&view=finsertar">
	<button class="btn btn-default" type="submit">Insertar Nueva Cita</button>
</form>
<br/>
<h1 id="titulin">Listado de citas</h1>
<br/>
<div id="tablap">
	<?php
		

echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
    
           
        <th width="15%" align="center">DESCRIPCIÓN CITA</th>
        <th width="15%" align="center">FECHA</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>';
      
	  $con=conectarCal();

	  $qr="SELECT * FROM events";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<tr><td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['description'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['evdate'])."</td>";
		
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=calendario&view=editar-borrar&id=".$info['id']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=calendario&view=borrar&id=".$info['id']."'><img src='images/delete.png' width='16' height='16'/></a></td></tr>";
		 $i++;
		  }
	  

      
    echo'</tbody>
</table>';
	?>
</div>