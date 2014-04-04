<?php
/*******************************************************************/
/*********JUAN GARCÍA DELICADO - http://www.cashuba.com*************/
/************************Tel: 95-252-40-19**************************/
/*******************************************************************/
//requerimos las variables globales


require ('config.php');

function conectar($bbdd){
	$conexion=mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, $bbdd);
		if($conexion==FALSE)
		{
		echo "<font color='red'><b>Error de conexión</b></font>";
		exit();
		}
		else
			return $conexion;
}

function desconectar ($conexion){
	mysqli_close ($conexion);
}

function consulta_sql ($sql, $conexion) {
$resultado=mysqli_query ($conexion, $sql);
return $resultado;
}
/*
function liberar($a){
mysqli_free_result ($a);
}
*/
//funcion que genera un desplegable con las provincias desde bbdd
function generaProvincias()
{
	$conexion=conectar("cuarenta_sorteos");
	//$consulta=mysql_query("SELECT id, opcion FROM lista_paises");
	$sentencia="SELECT id, provincia FROM provincia";
	$consulta=mysqli_query($conexion,$sentencia);
	desconectar($conexion);

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='provincia' id='provincia' class='input230_select' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
/*
function generaPaises(){

	$consulta=mysql_query("SELECT id_paises, paises FROM paises");
	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='pais id='pais' class='input230_select' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($reg_pais=mysql_fetch_row($consulta,MYSQLI_ASSOC)){
	echo "<option value='".$reg_pais[0]."'>".$reg_pais[1]."</option>";
	}
	echo "</select>";
	desconectar();
}
*/
//esta función contempla obtener el último id_sorteo insertado en BBDD
function maxIDsorteo(){
//$conexion=conectar("cuarenta_sorteos");
$select = "SELECT max( id_sorteo ) as maximo FROM sorteo"; 
$resulta = mysqli_query($conexion,$select); 
desconectar($conexion);
while ( $fila=mysqli_fetch_array($resulta,MYSQLI_ASSOC) ) 
{ 
    return $fila["maximo"];
	}  
}
/*
function nombre_archivo($conexion){
	//$max=maxIDsorteo();
	//$conexion= conectar("cuarenta_sorteos");
	$sql= "Select * from sorteo where id_sorteo=".$max;
	$result=mysqli_query ($conn,$sql) or die(mysql_error());
	desconectar($conexion);
	while ($filas=mysqli_fetch_array($result)){
		$nombre_sorteo= $filas["sorteo"];
		$prefijo= $filas["prefijo"];
		$nombre_archivo=$max.'_'.$prefijo.'_'.$nombre_sorteo;
		$nombre= str_replace(" ", "", $nombre_archivo);
		return $nombre.".txt";
		}
}
*/
?>