<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_GET);
	$borra="DELETE FROM todo_maniac.mensajes WHERE ID=$id";
		if(mysqli_query($con, $borra)==true) {
?>
			<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
			pero de todas maneras el php se sigue ejecutando y 
			si te das cuenta estoy todavía dentro del IF -->
			<script type='text/javascript'>
				window.location = "index.php?&sec=mensajes&view=listar-mensajes";
			</script>
<?php
		} //abro php de nuevo solo para cerrar el if
?>