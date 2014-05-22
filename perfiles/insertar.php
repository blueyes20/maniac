<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);

	//Recibir
	$nombre = $_POST['nombre_perfil'];
	$descripcion = $_POST['descripcion'];
	
	////

	$total = mysqli_num_rows(mysqli_query($con,"SELECT nombre_perfil FROM perfiles WHERE nombre_perfil='".$nombre."'"));
	if($total!=0){

		echo 'Hay '.$total.' perfiles registrados con ese nombre';
	}else{

		$inserta="INSERT INTO todo_maniac.perfiles (nombre_perfil, descripcion) VALUES ('".$nombre."', '".$descripcion."')";
		if(mysqli_query($con, $inserta)==true) {
		?>
			<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
			pero de todas maneras el php se sigue ejecutando y 
			si te das cuenta estoy todavía dentro del IF -->
			<script type='text/javascript'>
				window.location = "index.php?&sec=perfiles&view=listar-perfiles";
			</script>
<?php
		
		}//abro php de nuevo solo para cerrar el if
	}
?>