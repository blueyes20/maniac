<?php
	require_once("dll/functions.php");
	$con=conectarCal();
	extract($_POST);
	$actualiza="UPDATE ecalendar.events SET description='".utf8_decode($description)."', evdate='".$evdate."' WHERE id=$id";
	if(mysqli_query($con, $actualiza)==true) {
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php?&sec=calendario&view=listar-citas";
		</script>
<?php
	} //abro php de nuevo solo para cerrar el if
?>