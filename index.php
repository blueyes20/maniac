<?php
	session_start();
	if(isset($_SESSION["autenticado"])=="8a326427"){
		//include ('portada.php');
		include ('comunes/header.php');
include ('comunes/menu-lateral.php');
include ('comunes/content.php');
	}else{
		include('login.php');
	}

?>