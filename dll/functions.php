<?php
/*
==========================================================
=========OBTENEMOS LAS VARIABLES DE CONEXIÓN==============
===ESTAS SOLO SE PONEN UNA VEZ EN TOOOOODO EL PROYECTO====
==========================================================*/

require_once ('config.php');


/*
==========================================================
======= DEFINIMOS LA FUNCION DE CONECTAR A LA BBDD =======
==========================================================*/

function conectar(){
	$conexion= mysqli_connect (MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	//echo $conexion;
		if ($conexion==FALSE){
			echo  "error de conexion".mysqli_connect_error();
			exit();
			}else{
				return $conexion;
				}
}


/*
==========================================================
===== DEFINIMOS LA FUNCION DE DESCONECTAR A LA BBDD ======
==========================================================
*/

function desconectar ($c){
	mysqli_close ($c);
}

/*
==========================================================
======= DEFINIMOS LA FUNCION DE CONSULTAR A LA BBDD ======
==========================================================
*/

function consulta_sql ($base, $query) {
$r_r=mysqli_query ($base, $query);
return $r_r;
}

/*
==========================================================
======= DEFINIMOS LA FUNCION DE LIBERAR VARIABLES ========
==========================================================
*/

function liberar($a){
mysqli_free_result ($a);
}



/*
==========================================================
FUNCIÓN QUE GENERA UN SELECT CON LAS PROVINCIAS DE LA BBDD
==========================================================
*/
function generaProvincias($conex){
	//$conex= conectar();
	//$conexion=conectar("cuarenta_sorteos");
	//$consulta=mysql_query("SELECT id, opcion FROM lista_paises");
	$sentencia="SELECT id, provincia FROM provincia";
	$consulta=mysqli_query($conex,$sentencia);
	//desconectar($conex);

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
==========================================================
FUNCIÓN QUE RETORNA EL VALOR MÁXIMO DE id_sorteo de la tabla sorteo
==========================================================
*/
function maxIDsorteo(){
$conexion=conectar();
$select = "SELECT max( id_sorteo) as maximo FROM sorteo"; 
$resulta = mysqli_query($conexion,$select); 

while ( $fila=mysqli_fetch_array($resulta,MYSQLI_ASSOC) ) 
	{
	return $fila["maximo"];
	}  
desconectar($conexion);
}

/*
==========================================================
FUNCIÓN QUE RETORNA EL VALOR MÁXIMO DE id_usuario de la tabla usuarios
==========================================================
*/
function maxIDusuario(){
$conexion=conectar();
$select = "SELECT max( id_usuario) as maximo FROM usuarios"; 
$resulta = mysqli_query($conexion,$select); 

while ( $fila=mysqli_fetch_array($resulta,MYSQLI_ASSOC) ) 
	{
	return $fila["maximo"];
	}  
desconectar($conexion);
}

/*
==========================================================
FUNCIÓN QUE GENERA UN NOMBRE DE ARCHIVO concatenando datos de BBDD
==========================================================
*/
function nombre_archivo(){
	$max=maxIDsorteo();
	$conexion= conectar();
	$sql= "Select * from sorteo where id_sorteo=".$max;
	$result=mysqli_query ($conexion,$sql) or die(mysql_error());
	
	while ($filas=mysqli_fetch_array($result)){
		$nombre_sorteo= $filas["sorteo"];
		$prefijo= $filas["prefijo"];
		$nombre_archivo=$max.'_'.$prefijo.'_'.$nombre_sorteo;
		$nombre= str_replace(" ", "", $nombre_archivo);
		return $nombre.".txt";
		//devuelve el nombre del archivo [id_sorteo]_[prefijo]_[nombre_sorteo].txt
		//345_ipad2011_ipad2.txt (ejemplo)
		}
	desconectar($conexion);
}

/*
==========================================================
FUNCIÓN QUE anula el cache en los exploradores....
==========================================================
*/

	function nocache(){
	  header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
      header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
      header("Cache-Control: no-store, no-cache, must-revalidate");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
	}

/*
==========================================================
FUNCIÓN QUE RETORNA EL CAMPO "NUMERO DEFINITIVO", PASANDOLE EL PARAMETRO "MD5_DEFINITIVO"
==========================================================
*/
function sacar_numero_definitivo ($a){
	$conexion= conectar();
	$consulta= "select numero from codigo ";
	$consulta.= "where md5_definitivo='".$a."'";
	$re=consulta_sql($conexion,$consulta);
	while ( $fila=mysqli_fetch_array($re,MYSQLI_ASSOC) ) 
	{
	return $fila["numero"];
	}  
desconectar($conexion);
}

/*
=====================================================================================
======funcion que devuelve la clave del usuario por correo electrónico ==============
=====================================================================================
*/

function recuperar_clave_mail($correo){
	$conexion=conectar();
	$consulta= "SELECT clave from usuarios";
	$consulta.= " WHERE mail='".$correo."'";
	$resultado= consulta_sql($conexion,$consulta);
	while ($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
	return $fila["clave"];
	//$clave=$fila["clave"];
	}
	$asunto = "Tus datos de acceso.";
$cuerpo = '
<html>
<head>
   <title>Tus datos de Acceso a inside[Sorteos]</title>
</head>
<body>
<p>Muchas Gracias por participar en Inside[Sorteos], a continuaci&oacute;n ver&aacute;s reflejados los datos de acceso a tu  <a href="http://www.insidenerja.com/sorteos/users">Panel de Control</a><br>
</p>
<table width="500" border="0">
  <tr>
    <td colspan="2" align="center">Con los datos siguientes podr&aacute;s acceder al <a href="http://www.insidenerja.com/sorteos/users">Panel de Control</a></td>
  </tr>
  <tr>
    <td width="214" align="right">Email:</td>
    <td width="270"><b>'.$correo.'</b></td>
  </tr>
  <tr>
    <td align="right">Clave:</td>
    <td><b>'.$clave.'</b></td>
  </tr>
</table>
<br>Si dispones de m&aacute;s c&oacute;digos tienes que insertarlos desde tu panel de usuario accediendo a <a href="http://www.insidenerja.com/sorteos/users">Panel de Control</a> Recuerda que te tienes que identificar con tu correo electr&oacute;nico y clave. <br>
<br><p>De acuerdo a la Ley Organica de Protecci&oacute;n de Datos de Caracter Personal, regulada por el RD 1720/2007, puedes realizar el acceso, consulta, <br>modificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n de tus datos en cualquier momento dirigiendote a <a href="mailto:lopd@insidenerja.com">lopd@insidenerja.com</a>. <br><br>Recuerda que las condiciones legales que rigen esta promoci&oacute;n las puedes consultar en cualquier momento, visitando el siguiente enlace:</p> <a href="http://www.insidenerja.com/sorteos/index.php?contenido=bases">Aviso Legal, Bases del Sorteo, Politica de Privacidad y Proteccion de Datos</a>

</body>
</html>
';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: Inside[Sorteos]  <sorteos@insidenerja.com>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: sorteos@insidenerja.com\r\n";

//ruta del mensaje desde origen a destino
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibián copia
$headers .= "Cc: ".$correo."\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

mail($correo,$asunto,$cuerpo,$headers);
	
	}
/*
=====================================================================================
======funcion que el nombre del sorteo, pasando la variable id_sorteo ==============
=====================================================================================
*/
function nombre_sorteo($id_sorteo){
	$conexion=conectar();
	$consulta= "SELECT sorteo from sorteo";
	$consulta.= " WHERE id_sorteo='".$id_sorteo."'";
	$resultado= consulta_sql($conexion,$consulta);
	while ($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
	return $fila["sorteo"];
	//$clave=$fila["clave"];
	}
}


/*
=====================================================================================
======funcion que completa con ceros por delante el numero que pasemos  ==============
=====================================================================================
*/

function rellenar_numeros($num,$ceros_a_poner) {
return str_pad((int) $num,$ceros_a_poner,"0",STR_PAD_LEFT);
}


/*
==================================================================================================
FUNCIÓN QUE GENERA UN SELECT DE CUALQUIER TABLA PASANDO LAS VARIABLES ID y ETIQUETA QUE QUERAMOS
==================================================================================================
*/


function SelectNormal($conex,$tabla,$id_tabla,$etiqueta){
	$conex= conectar();
	$consulta="SELECT * FROM $tabla";
	$info=mysqli_query($conex,$consulta);
	echo "<select name='$etiqueta'>";
	echo "<option value='0'>Elige</option>";
	while($info2=mysqli_fetch_array($info)){
		echo'<option value="'.$info2["$id_tabla"].'"';
		echo '>'.$info2["$etiqueta"].'</option>';
		}
  		echo '</select>';  
}


//$conecto=conectar();
//generaSelectNormal($conecto,"categorias","id_categoria","categoria"); 

/*
==================================================================================================
FUNCIÓN QUE GENERA UN SELECT CON TODOS LOS DATOS Y SELECCIONA EL QUE ES ENVIADO.
==================================================================================================
*/

function SelectAvanzSelecc($conex,$tabla,$id_Tabla,$etiqueta,$tabla2,$id_tabla2,$etiqueta2,$id){
	$conex= conectar();
	$consulta="SELECT * FROM $tabla WHERE $id_Tabla=".$id;
	$i=mysqli_query($conex,$consulta);
	$in=mysqli_fetch_array($i);
	//$inn=$in["$etiqueta"];
	
	$consulta2="SELECT * FROM $tabla2";
	$i2=mysqli_query($conex,$consulta2);
	
	echo '<select name="$etiqueta" id="$etiqueta">'; 	
	while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["$id_tabla2"].'"';
					
					if($in["$etiqueta"]==$in2["$id_tabla2"])
						echo 'selected="selected"';
					
					echo '>'.$in2["$etiqueta2"].'</option>';
					}
  			   echo '</select>';  
	
}

//$conecto=conectar();
//generaSelectAvanzadoSeleccionado($conecto,"tareas","num","cliente","clientes","id_clientes","nombre","1");
/*
==================================================================================================
FUNCIÓN QUE GENERA UN SELECT CON TODOS LOS DATOS Y SELECCIONA EL QUE ES ENVIADO.
==================================================================================================
*/

function SelectAvanzado($conex,$tabla,$id_Tabla,$etiqueta,$tabla2,$id_tabla2,$etiqueta2){
	$conex= conectar();
	$consulta="SELECT * FROM $tabla";
	$i=mysqli_query($conex,$consulta);
	$in=mysqli_fetch_array($i);
	//$inn=$in["$etiqueta"];
	
	$consulta2="SELECT * FROM $tabla2";
	$i2=mysqli_query($conex,$consulta2);
	
	echo '<select name="$etiqueta" id="$etiqueta">'; 	
	
	while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["$id_tabla2"].'">'.$in2["$etiqueta2"].'</option>';
	}
	echo '</select>';  
}

//$conecto=conectar();
//generaSelectAvanzado($conecto,"tareas","num","cliente","clientes","id_clientes","nombre","1");
		   
/*
==================================================================================================
FUNCIÓN BORRAR RECUPERAR
==================================================================================================
*/
function Delete_Recup($conex,$tabla,$id_tabla,$etiqueta,$id,$del){
	$conex= conectar();
	if($del==1){
		$actualiza="UPDATE $tabla SET $etiqueta=$del WHERE $id_tabla=".$id;
		$envio=mysqli_query($conex,$actualiza);
	}else{
		$actualiza2="UPDATE $tabla SET $etiqueta=$del WHERE $id_tabla=".$id;
		$envio2=mysqli_query($conex,$actualiza2);
	}
}


function Delete_Recup2($conex,$tabla,$id_tabla,$etiqueta,$id,$del){
	$conex= conectar();
	if(isset($del)){
		$actualiza="UPDATE $tabla SET $etiqueta=$del WHERE $id_tabla=".$id;
		$envio=mysqli_query($conex,$actualiza);
	}
}
/*
==================================================================================================
---- NO ESTÁ TERMINADO ---- (FUNCIÓN QUE LISTA LOS CLIENTES SEGUN SU PRIORIDAD)
==================================================================================================
*/

function ListarClientes($conex,$istareas,$estado){
	$conex= conectar();
	$consulta="SELECT * FROM tareas";
	$i=mysqli_query($conex,$consulta);
	$in=mysqli_fetch_array($i);
	//$inn=$in["$etiqueta"];
	
	$consulta2="SELECT * FROM $tabla2";
	$i2=mysqli_query($conex,$consulta2);
	
	echo '<select name="$etiqueta" id="$etiqueta">'; 	
	
	while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["$id_tabla2"].'">'.$in2["$etiqueta2"].'</option>';
	}
	echo '</select>';  
}

//$conecto=conectar();
//generaSelectAvanzado($conecto,"tareas","num","cliente","clientes","id_clientes","nombre","1");
/*
==================================================================================================
--- NO ESTÁ TERMINADO --- (FUNCIÓN QUE LISTA LAS TAREAS)
==================================================================================================
*/

function ListarTareas($conex,$isdeleted,$estado){
	$conex= conectar();
	$consulta="SELECT * FROM tareas";
	$i=mysqli_query($conex,$consulta);
	$in=mysqli_fetch_array($i);
	
	$consulta2="SELECT * FROM prioridades";
	$i2=mysqli_query($conex,$consulta2);
	
	echo '<select name="PRIORIDAD" id="id_prioridad">'; 	
	
	while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["prioridad"].'">'.$in2["prioridad"].'</option>';
	}
	echo '</select>';
	
	echo '<select name="$etiqueta" id="$etiqueta">';
		while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["$id_tabla2"].'">'.$in2["$etiqueta2"].'</option>';
	}
	echo '</select>';  
	
		echo '<select name="$etiqueta" id="$etiqueta">';
		while($in2=mysqli_fetch_array($i2)){
		echo'<option value="'.$in2["$id_tabla2"].'">'.$in2["$etiqueta2"].'</option>';
	}
	echo '</select>'; 
  
}

//$conecto=conectar();
//ListarTareas($conecto,"","","","","","","");
?>

