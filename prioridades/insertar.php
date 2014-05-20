<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);
	$inserta="INSERT INTO todo_maniac.prioridades (nombre_prioridad) VALUES ('".$_POST['nombre_prioridad']."')";
	if(mysqli_query($con, $inserta)==true) {
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php?&sec=prioridades&view=listar-prioridades";
		</script>
<?php
	} //abro php de nuevo solo para cerrar el if
?>