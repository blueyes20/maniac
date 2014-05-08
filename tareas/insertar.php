<?php
require_once("dll/functions.php");
$con=conectar();
extract($_POST);
$cliente = $_POST["cliente"];
$categoria = $_POST["categoria"];
$prioridad = $_POST["prioridad"];
$tarea = $_POST["tarea"];
$importe = $_POST["importe"];
$inserta2="INSERT INTO tareas (cliente, categoria, prioridad, tarea, importe) VALUES ('$cliente', '$categoria', '$prioridad', '$tarea', '$importe')";
if(mysqli_query($con, $inserta2)==true) {
	//echo "$inserta2";
?>
<!--Cierro php temporalmente para incluir el script sin inconvenientes, 
	pero de todas maneras el php se sigue ejecutando y 
	si te das cuenta estoy todavía dentro del IF -->
<script type='text/javascript'>
window.location = "index.php?&sec=tareas&view=listar-tareas";
</script>

<?php
} //abro php de nuevo solo para cerrar el if
?>