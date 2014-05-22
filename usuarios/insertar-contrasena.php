<?php
	require_once("dll/functions.php");
	$con=conectar();
	extract($_POST);
    $usuario_clave = md5($_POST["usuario_clave"]); // encriptamos la nueva contraseña con md5
	
                    if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
                        echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
                    }else {
                        $sql = "UPDATE todo_maniac.usuarios SET contrasena='".$usuario_clave."' WHERE codusu=$id";
                        if(mysqli_query($con, $sql)==true) {
		
?>
		<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
		pero de todas maneras el php se sigue ejecutando y 
		si te das cuenta estoy todavía dentro del IF -->
		<script type='text/javascript'>
			window.location = "index.php";
		</script>

<?php
	}} //abro php de nuevo solo para cerrar el if
?>