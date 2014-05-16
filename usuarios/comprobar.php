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

/*
if($usuario==$resultado01["nombreusu"] && $resultado01["contrasena"]==md5($contrasena)){
		$_SESSION["autenticado"]="8a326427";
		$_SESSION["id_usuario"]=$resultado01["codusu"];
		echo $_SESSION["id_usuario"];
		//session_destroy();
		die();
		header ('Location:../portada.php');

}else{

		header ('Location:../index.php');

}
*/
$md5= md5($contrasena);
//cho $md5;

$sql= 'SELECT * FROM usuarios WHERE nombreusu="'.$usuario.'" AND contrasena ="'.$md5.'"';
//echo $sql;
//die("hasta-md5");
//$proceso= mysqli_query($con,$sql);

$resultados= mysqli_num_rows (mysqli_query($con,$sql));
echo $resultados;

$tu=mysqli_query($con,$sql);
$matriz=mysqli_fetch_array($tu);

$id_cliente= $matriz['codusu'];
//echo "el codigo de usuario es...." . $id_cliente;
//echo "<BR/><BR/><BR/>";

//die();

if($resultados ==1){
$_SESSION["autenticado"]="8a326427";
$_SESSION["id_usuario"]=$id_cliente;
		//echo $_SESSION["id_usuario"];
		//session_destroy();
		
		//ie("hola");
		
		header ('Location:../portada.php');
	}else{

		
header ('Location:../index.php');

	}
?>