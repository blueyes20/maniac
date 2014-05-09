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
	
	echo '<select class="element select medium" name="'.$etiqueta.'" id="'.$etiqueta.'">'; 	
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
FUNCIÓN QUE GENERA UN SELECT CON TODOS LOS DATOS.
==================================================================================================
*/

function Listar($conex,$tabla,$id_Tabla,$etiqueta,$tabla2,$id_tabla2,$etiqueta2){
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

/*Se está usando ésta*/

function Delete_Recup2($conex,$tabla,$id_tabla,$etiqueta,$id,$del){
	$conex= conectar();
	if(isset($del)){
		$actualiza="UPDATE $tabla SET $etiqueta=$del WHERE $id_tabla=".$id;
		$envio=mysqli_query($conex,$actualiza);
	}
}

/*
==================================================================================================
NO TERMINADO ---------->FUNCIÓN PARA LISTAR EL MENÚ DE ACUERDO A LOS PERMISOS DADOS A CADA USUARIO
LA FUNCIÓN COGERÁ EL ID DE USUARIO POR VARIABLES y MOSTRARÁ SU MENU
==================================================================================================
*/
function Menu_Pintar2($conex,$usuario){
	$padre= ' ';
	$iniciohijo= ' ';
	$hijo= ' ';
	$finhijo= ' ';
	$finpadre= ' ';

		$conex= conectar();
		$consulta="SELECT * FROM permisos,menus WHERE permisos.menu_id=menus.id_menu AND usuario=".$usuario;
		$i=mysqli_query($conex,$consulta);
	
		//$menu .= '<ul>';
		$iniciohijo .='<ul>';
		while ($in=mysqli_fetch_array($i)){

			//<li class="dropdown"><a href="#"><span class="iconfa-th-list"></span> Tareas</a>
			if($in["padre"]==0) {
				$padre .= '<li class="dropdown"><a href="'.$in["url"].'"><span class=iconfa-th-list"></span> '.$in["etiqueta"].'</a>';
				
			}
			if($in["padre"]==1){
				$hijo .='<li><a href='.$in["url"].'> '.$in["etiqueta"].'</a></li>';
				
			}	

			
		
		}
		$finpadre .= '</li>';
		$finhijo .='</ul>';
		

		//echo '<div id="tabs">'.$padre,$hijo.'</div>';
		echo '<div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">MI MENU</li>
                <li class="active"><a href="index.php"><span class="iconfa-laptop"></span>PORTADA</a></li>'.$padre,$iniciohijo,$hijo,$finhijo,$finpadre.'</ul> 
        </div>';
		
}





/*
==================================================================================================
FUNCIÓN QUE LISTA LAS TAREAS
==================================================================================================
*/

// Necesito listar todas las tareas sea cual sea su prioridad pasando el parametro id_prioridad 
//a una función luego con un bucle, lo recorremos todo
function Listar_tareas(){
	$con=conectar();
	// sacar el maximo id metido y desde cero los recorremos
	$maximoRegistro="SELECT MAX(id_prioridad) AS numero FROM prioridades";
	$max=mysqli_query($con,$maximoRegistro);
	$maxVar= mysqli_fetch_array ($max);
	
	//echo $maxVar['MAX(id_prioridad)'];
	//die();
	// como sabemos que 6 es el mayor registro, con un for recorremos todos los registros y mostramos en panatalla lo que nos interesa
	//for($a=1;$a<$maxVar; $a++){
		
		for($a=1;$a<=$maxVar['numero'];$a++){
		$sql= "SELECT * FROM tareas WHERE prioridad=".$a;
	$sql2= "SELECT * from prioridades WHERE id_prioridad=".$a;
	$n=mysqli_query ($con, $sql2);
	$nn= mysqli_fetch_array($n);
	$noborrados=$nn['isborrao'];
	if($noborrados==0){
	echo '<h1 id="titulin">'.$nn['nombre_prioridad'].'</h1>';
		//////
	//////////
/////////////////tablassss

$qr="SELECT *,date_format(tareas.fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes,categorias WHERE tareas.cliente=clientes.id_clientes AND tareas.categoria=categorias.id_categoria AND tareas.prioridad=$a AND tareas.isdeleted=0";
	  $result=consulta_sql($con,$qr);
	  
	echo'<div id="tablap">
	<table width="100%" border="0" class="display datatable">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="10%" align="center">SECCIÓN</th>
        <th width="45%" align="left">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="5%" align="center">MÁS</th>
      </tr>
    </thead>  
	<tbody>'; 
		$i=0;
		while($info=mysqli_fetch_array($result)){
		  
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='todo.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
		
		echo'      
    	</tbody>
		</table>
		</div>';
	}

/////////////////
	/////////////////////
	////////////////////tablas
}
	

}








/**/




function Lista_Tareas2($con,$prioridad,$isdeleted){
	  $con=conectar();

	  $qr="SELECT *,date_format(tareas.fecha, '%d/%m/%Y') AS Fecha FROM tareas,clientes WHERE tareas.cliente=clientes.id_clientes AND tareas.prioridad=$prioridad AND tareas.isdeleted=$isdeleted";
	  $result=consulta_sql($con,$qr);
	  
	echo'
	<h1 id="titulin">"'.$prioridad.'"</h1>

    <div id="tablap">
	<table width="100%" border="0" class="display datatable">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="10%" align="center">SECCIÓN</th>
        <th width="45%" align="left">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="5%" align="center">MÁS</th>
      </tr>
    </thead>  
	<tbody>'; 
		$i=0;
		while($info=mysqli_fetch_array($result)){
		  
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='todo.php?id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
		
		echo'      
    	</tbody>
		</table>
		</div>';

}
		
//$conecto=conectar();
//ListarTareas($conecto,"","","","","","","");

function Listar_Tareas03($con,$prioridad){
$con=conectar();

$consulta01="SELECT * FROM tareas WHERE prioridad=$prioridad";
$envio01=mysqli_query($con,$consulta01);

	
		echo'
	<table width="100%" border="0" class="display datatable">
    <thead>
      <tr>
        <th width="5%" align="center">Nº</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="10%" align="center">SECCIÓN</th>
        <th width="45%" align="left">TAREA</th>
        <th width="10%" align="center">€</th>
        <th width="5%" align="center">MÁS</th>
      </tr>
    </thead>  
	<tbody>'; 
	$i=0;
	while($resultado01=mysqli_fetch_array($envio01)){
		
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($resultado01['num'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$resultado01['fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($resultado01['cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($resultado01['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($resultado01['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($resultado01['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='editar-borrar.php?id=".$resultado01['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='todo.php?id=".$resultado01['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
	$i++;
	}
	echo'      
    	</tbody>
		</table>';
}
?>