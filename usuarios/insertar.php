<?php

##########################
#						 #
#  Funicona????????????? #
#						 #
##########################


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

		echo '<p>Hay '.$total.' usuario registrado con ese nombre</p>';
		#botón volver:
		echo'<br/><form role="form" method="post" action="index.php?&sec=usuarios&view=listar-usuarios">
		<button class="btn btn-default" type="submit">Volver</button>
		</form>';


		#####

	}else{
		$inserta="INSERT INTO todo_maniac.usuarios (nombreusu, contrasena, email, telef) VALUES ('".$nombreusu."', '".$password."', '".$email."', '".$telef."')";
		if(mysqli_query($con, $inserta)==true) {
			
				$consulta=mysqli_query($con,"SELECT codusu FROM usuarios WHERE nombreusu='".$nombreusu."'");
				$usuarioId = mysqli_fetch_array($consulta);
				#echo $usuarioId['codusu'];
				$idUsuario=$usuarioId['codusu'];

			if(isset($elmenu1) && $elmenu1==1){	
				$insertamenu=mysqli_query($con,"INSERT INTO todo_maniac.menusu (usuid, menuid) VALUES ('$idUsuario', '$elmenu1')");
			}				
			if(isset($elmenu2) && $elmenu2==2){
				$insertamenu=mysqli_query($con,"INSERT INTO todo_maniac.menusu (usuid, menuid) VALUES ('$idUsuario', '$elmenu2')");
			}
			if(isset($elmenu3) && $elmenu3==3){
				$insertamenu=mysqli_query($con,"INSERT INTO todo_maniac.menusu (usuid, menuid) VALUES ('$idUsuario', '$elmenu3')");
			}
			if(isset($elmenu4) && $elmenu4==4){
				$insertamenu=mysqli_query($con,"INSERT INTO todo_maniac.menusu (usuid, menuid) VALUES ('$idUsuario', '$elmenu4')");
			}
			if(isset($elmenu5) && $elmenu5==5){
				$insertamenu=mysqli_query($con,"INSERT INTO todo_maniac.menusu (usuid, menuid) VALUES ('$idUsuario', '$elmenu5')");
			}
			
			echo"<script type='text/javascript'>window.location = 'index.php?&sec=usuarios&view=listar-usuarios';
					</script>";
			
		}
	}
					
?>