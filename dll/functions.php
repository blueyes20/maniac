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
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
        <th width="10%" align="center">FECHA</th>
        <th width="15%" align="center">CLIENTE</th>
        <th width="10%" align="center">'.utf8_encode('SECCIÓN').'</th>
        <th width="45%" align="left">TAREA</th>
        <th width="10%" align="center">'.utf8_encode('€').'</th>
        <th width="5%" align="center"></th>
      </tr>
    </thead>  
	<tbody>'; 
		$i=0;
		while($info=mysqli_fetch_array($result)){
		  
		  echo "<td width='3%' class='fila_". $i%2 ."'>".$info['num']."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".$info['Fecha']."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='35%' class='fila_". $i%2 ."'>".utf8_encode ($info['tarea'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['importe'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=tareas&view=editar-borrar&id=".$info['num']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=tareas&view=borrar&id=".$info['num']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
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

/*
==================================================================================================
FUNCIÓN QUE LISTA LOS CLIENTES
==================================================================================================
*/

function Listar_clientes() {
	echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
    
        <th width="15%" align="center">CLIENTE</th>
        <th width="15%" align="center">'.utf8_encode('TELÉFONO').'</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>';

	$con=conectar();

	$qr="SELECT * FROM clientes WHERE isborrado=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id_clientes'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_cliente'])."</td>";
		  echo "<td width='10%' class='fila_". $i%2 ."'>".utf8_encode ($info['telefono'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=clientes&view=editar-borrar&id=".$info['id_clientes']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=clientes&view=borrar&id=".$info['id_clientes']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }

		      echo'</tbody>
</table>';



}


/*
==================================================================================================
FUNCIÓN QUE LISTA LAS PRIORIDADES
==================================================================================================
*/

function Listar_prioridades()  {

echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
    
        <th width="15%" align="center">PRIORIDAD</th>
      
      </tr>
    </thead>
    <tbody>';
      
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM prioridades WHERE isborrao=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id_prioridad'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_prioridad'])."</td>";  
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=prioridades&view=editar-borrar&id=".$info['id_prioridad']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=prioridades&view=borrar&id=".$info['id_prioridad']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

     
    echo'</tbody>
</table>';



}

///////////////////////

/*
==================================================================================================
FUNCIÓN QUE LISTA LAS CATEGORÍAS
==================================================================================================
*/

function Listar_categorias() {

echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
    
        <th width="15%" align="center">'.utf8_encode('CATEGORÍA').'</th>
        <th width="10%" align="center"></th>
      
      </tr>
    </thead>
    <tbody>';
      
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM categorias WHERE isborrao2=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id_categoria'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['categoria'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=categorias&view=editar-borrar&id=".$info['id_categoria']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=categorias&view=borrar&id=".$info['id_categoria']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";		 
		 $i++;
		  }
	  

      
    echo'</tbody>
</table>';

}


///////////////////////

/*
==================================================================================================
FUNCIÓN QUE LISTA LOS USUARIOS
==================================================================================================
*/

function Listar_usuarios (){

echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
    
        <th width="15%" align="center">USUARIO</th>
        <th width="15%" align="center">EMAIL</th>
        <th width="15%" align="center">'.utf8_encode('TELÉFONO').'</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>';
      
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM usuarios WHERE esborrado=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['codusu'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombreusu'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['email'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['telef'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=usuarios&view=editar-borrar&id=".$info['codusu']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=usuarios&view=borrar&id=".$info['codusu']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      
    echo'</tbody>
</table>';

}

/*
==================================================================================================
FUNCIÓN QUE LISTA LOS PERFILES
==================================================================================================
*/

function Listar_perfiles (){

echo'<table width="100%" border="0">
    <thead>
      <tr>
        <th width="5%" align="center">'.utf8_encode('Nº').'</th>
    
        <th width="15%" align="center">PERFIL</th>
        
        <th width="15%" align="center">'.utf8_encode('DESCRIPCIÓN').'</th>
        
        <th width="10%" align="center"></th>
      </tr>
    </thead>
    <tbody>';
      
	  $con=conectar();
//	  $query="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas WHERE prioridad='CRITICO'";
//	  $qr="SELECT *,date_format(fecha, '%d/%m/%Y') AS Fecha FROM tareas LEFT JOIN clientes ON tareas.cliente = clientes.id_clientes WHERE prioridad = 'CRITICO'";
	  $qr="SELECT * FROM perfiles WHERE isborradop=0";
	  		
		$result=consulta_sql($con,$qr);
	$i=0;
		while($info=mysqli_fetch_array($result)){
		  echo "<td width='3%' class='fila_". $i%2 ."'>".utf8_encode ($info['id_perfil'])."</td>";
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['nombre_perfil'])."</td>";
		  
		  echo "<td width='15%' class='fila_". $i%2 ."'>".utf8_encode ($info['descripcion'])."</td>";
		  echo "<td width='7%' class='fila_". $i%2 ."'><a href='index.php?&sec=perfiles&view=editar-borrar&id=".$info['id_perfil']."'><img src='images/edit.png' width='16' height='16'/></a> | <a href='index.php?&sec=perfiles&view=borrar&id=".$info['id_perfil']."&del=1'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
		 $i++;
		  }
	  

      
    echo'</tbody>
</table>';

}


/*
==================================================================================================
---no implementada---LISTAR EN UNA TABLA (MODO GENERALIZADO, utilizado para listar los mensajes)
==================================================================================================
*/

function Listando () {

	###implementar en modo general.

}


/*
==================================================================================================
FUNCIONES PARA MOSTRAR DIFERENTES APARTADOS DEL MENÚ LATERAL.
==================================================================================================
*/

function menuTarea () {

	echo'<!-- Inicio Tareas -->
                <li class="dropdown"><a href="#"><span class="iconfa-th-list"></span> Tareas</a>
                    <ul>
                        <li><a href="index.php?&sec=tareas&view=listar-tareas"> Lista de Tareas</a></li>

                        <!-- Inicio Nuevas Tareas-->
                        <li><a href="index.php?&sec=tareas&view=finsertar"> Nueva Tarea</a></li>
                        <!-- Fin Nuevas Tareas-->
                        
                    </ul>
                </li>
                <!-- Fin Tareas -->';

}

function menuCliente () {

	echo'<!-- Inicio Clientes -->
                <li class="dropdown"><a href="#"><span class="iconfa-briefcase"></span> Clientes</a>
                    <ul>
                        <li><a href="index.php?&sec=clientes&view=listar-clientes"> Lista de Clientes</a></li>

                        <!-- Inicio Crear un cliente-->
                        <li><a href="index.php?&sec=clientes&view=finsertar"> Nuevo Cliente</a></li>
                        <!-- Fin Crear un cliente -->

                    </ul>
                </li>
                <!-- Fin clientes -->';

}

function menuConfig () {

	echo'<!-- Inicio Configuración -->
                <li class="dropdown"><a href=""><span class="iconfa-pencil"></span> '.utf8_encode('Configuración').'</a>
                    <ul>
                        <li><a href="index.php?&sec=prioridades&view=listar-prioridades"> Prioridades</a></li>
                        <li><a href="index.php?&sec=categorias&view=listar-categorias"> '.utf8_encode('Categorías').'</a></li>
                        <!--<li><a href="index.php?&sec=perfiles&view=listar-perfiles"> Perfiles Usuarios</a></li>-->
                        
                    </ul>
                </li>
                <!-- Fin Configuración -->';

}

function menuUsu () {

	echo'<!-- Inicio Usuarios -->
                <li class="dropdown"><a href=""><span class="iconfa-user"></span> Usuarios</a>
                    <ul>
                        <li><a href="index.php?&sec=usuarios&view=listar-usuarios"> Lista Usuarios</a></li>

                        <!-- Inicio nuevo usuario -->
                        <li><a href="index.php?&sec=usuarios&view=finsertar"> Nuevo Usuario</a></li>
                        <!-- Fin nueo usuario -->
                        
                    </ul>
                </li>
                 <!-- Fin Usuarios -->';

}

function menuMensaje () {

	 echo'<!-- Inicio Mensajes -->
                 <li class="dropdown"><a href=""><span class="iconfa-envelope"></span> Mensajes</a>
                    <ul>
                        <li><a href="index.php?&sec=mensajes&view=listar-mensajes">Lista Mensajes Recibidos</a></li>
                        <li><a href="index.php?&sec=mensajes&view=listar-enviados-mensajes">Lista Mensajes Enviados</a></li>
                        <li><a href="index.php?&sec=mensajes&view=crear-mensajes">Nuevo Mensaje</a></li>
                    </ul>
                </li>
                 <!-- Fin Mensajes -->';

}

?>