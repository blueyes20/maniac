<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);

	//Recibir
	$nombreusu = $_POST['nombreusu'];
	$email = $_POST['email'];
	$telef = $_POST['telef'];
	$password = md5($_POST['contrasena']);
	////

	$total = mysqli_num_rows(mysqli_query($con,"SELECT nombreusu FROM usuarios WHERE nombreusu='".$nombreusu."'"));
	if($total!=0){

		echo 'Hay '.$total.' usuario registrado con ese nombre';
	}else{

		$inserta="INSERT INTO todo_maniac.usuarios (nombreusu, contrasena, email, telef) VALUES ('".$nombreusu."', '".$password."', '".$email."', '".$telef."')";
		if(mysqli_query($con, $inserta)==true) {
		?>
			<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
			pero de todas maneras el php se sigue ejecutando y 
			si te das cuenta estoy todavía dentro del IF -->
			<script type='text/javascript'>
				window.location = "index.php?&sec=usuarios&view=listar-usuarios";
			</script>
<?php
		
		}//abro php de nuevo solo para cerrar el if
	}
?>