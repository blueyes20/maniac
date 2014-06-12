<?php
	require_once("dll/functions.php");
	$conn=conectarCal();
	extract($_POST);
	$inserta="INSERT INTO ecalendar.events (description, evdate) VALUES ('".$_POST['description']."', '".$_POST['evdate']."')";
	if(mysqli_query($conn, $inserta)==true) {
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php?&sec=calendario&view=calendario";
		</script>
<?php
	} //abro php de nuevo solo para cerrar el if
?>