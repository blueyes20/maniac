<?php
	@$SEC = $_REQUEST['sec'];
	if(!$SEC){
		include('bienvenida.php');
	}else{
		include($SEC . '/index.php');
	}
?>