<?php
require_once("dll/functions.php");
$con=conectar();
extract($_POST);

//Recibir
$nombreusu = $_POST['nombreusu'];
$email = $_POST['email'];
$telef = $_POST['telef'];
$password = md5($_POST['contrasena']);



if($query="SELECT * FROM usuarios WHERE numbreusu like '".$nombreusu."'"){
	//el usuario existe
    echo "El usuario --> ".$nombreusu." --> ya existe";
	
			
			//$inserta="INSERT INTO todo_maniac.usuarios (nombreusu, contrasena, email, telef) VALUES ('".$nombreusu."', '".$password."', '".$email."', '".$telef."')";
			//if(mysqli_query($con, $inserta)==true) {
			




			
    	
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