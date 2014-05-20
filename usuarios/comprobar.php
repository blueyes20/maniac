<?php
	session_start();
	require_once("../dll/config.php");
	require_once("../dll/inyection_sql.php");
	require_once("../dll/functions.php");
	$con=conectar();

	$usuario=$_POST["username"];
	$contrasena=$_POST["password"];

	$consulta01="SELECT * FROM usuarios";
	$envio01=mysqli_query($con,$consulta01);
	$resultado01=mysqli_fetch_array($envio01);


	$md5= md5($contrasena);
	$sql= 'SELECT * FROM usuarios WHERE nombreusu="'.$usuario.'" AND contrasena ="'.$md5.'"';
	$resultados= mysqli_num_rows (mysqli_query($con,$sql));
	echo $resultados;

	$tu=mysqli_query($con,$sql);
	$matriz=mysqli_fetch_array($tu);

	$id_cliente= $matriz['codusu'];
	if($resultados ==1){
		$_SESSION["autenticado"]="8a326427";
		$_SESSION["id_usuario"]=$id_cliente;
		header ('Location:../index.php');
	}else{
		header ('Location:../login.php');
	}
?>