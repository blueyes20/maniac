<!-- Botón para crear mensaje -->
<form role="form" method="post" action="index.php?&sec=mensajes&view=crear-mensajes">
  <button class="btn btn-default" type="submit">Crear Nuevo Mensaje</button>
 </form>
 <br/>
<!-- -->
<!-- -->
<!-- -->
<!-- -->
<?php 
	#nombre del usuario actual:
    	$select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
        $b=mysqli_query($con,$select); 
        $matriz=mysqli_fetch_array($b);
	# Obtenemos el mensaje privado
    	$id = $_GET['id'];
    	$sql = "SELECT * FROM mensajes WHERE de='".$matriz['nombreusu']."' AND ID='".$id."'";
    	$res = mysqli_query($con, $sql) or die(mysql_error());
    	$row = mysqli_fetch_assoc($res);
?>

<div class="widget">
    <h4 class="widgettitle">Mensaje de: <strong><?=$row['de']?><strong></h4>
      <div class="widgetcontent">
      	<p class="blue">De:</p><?=$row['de']?><br />
		<p class="blue">Fecha y hora:</p><?=$row['fecha']?><br />
		<p class="blue">Asunto:</p><?=$row['asunto']?><br /><br />
		<p class="blue">Mensaje:</p>
		<?=$row['texto']?>
		<?php 
			# Avisamos que ya lo leimos
			if($row['leido'] != "si"){
				mysqli_query($con, "UPDATE mensaje SET leido='si' WHERE ID='".$id."'");
			}
		?>
		<br/><br/>
		 
 </form>
      </div><!-- widgetcontent-->
</div><!-- widgetcontent-->
 <br/>
 <!-- Botón para volver a mensajes recibidos -->
 <form role="form" method="post" action="index.php?&sec=mensajes&view=listar-enviados-mensajes">
  <button class="btn btn-default" type="submit">Volver</button>
 </form>
</div>
</div>