<?php
	session_start();
	if(isset($_SESSION["autenticado"])=="8a326427"){
	include ('portada.php');
	}else{
	include('login.php');
	}
?>
