<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);
	$actualiza="UPDATE todo_maniac.categorias SET categoria='".utf8_decode($categoria)."' WHERE id_categoria=$id";

	if(mysqli_query($con, $actualiza)==true) {
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php?&sec=categorias&view=listar-categorias";
		</script>
<?php
	} //abro php de nuevo solo para cerrar el if
?>