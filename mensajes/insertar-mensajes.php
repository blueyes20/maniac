<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);
	$fecha = date("j/m/Y, g:i a");
	$asunto = $_POST["asunto"];
	$texto = $_POST["texto"];
	$inserta2="INSERT INTO mensajes (para, de, fecha, asunto, texto) VALUES ('$para', '$de', '$fecha', '$asunto', '$texto')";
	if(mysqli_query($con, $inserta2)==true) {
		
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php?&sec=mensajes&view=listar-enviados-mensajes";
		</script>

<?php
	} //abro php de nuevo solo para cerrar el if
?>