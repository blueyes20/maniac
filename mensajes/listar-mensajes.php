<form role="form" method="post" action="index.php?&sec=mensajes&view=crear-mensajes">
  <button class="btn btn-default" type="submit">Crear Nuevo Mensaje</button>
</form>
<br/>
<!--
<?php 
# Incluimos la configuracion
#include('config.php'); 
#session_start();
#if($_SESSION['logueado'] != "SI"){
#header('location: index.php');
#exit();
#}
# Buscamos los mensajes privados
#$sql = "SELECT * FROM mensaje WHERE para='".$_SESSION['usuario']."'";
#$res = mysql_query($sql, $link) or die(mysql_error());
?>
-->


<!-- Formulario extraido de tareas para adaptarlo a un formulario de mensajes -->

<div class="widget">
    <h4 class="widgettitle">Formulario de Inserción de Tarea</h4>
      <div class="widgetcontent">
        <form role="form" method="post" action="index.php?&sec=tareas&view=insertar">
          <div class="form-group">
            <label for="exampleInputEmail1">Cliente</label>
            <div>
              <?php
                $consulta="SELECT * FROM tareas";
                $i=mysqli_query($con,$consulta);
                $in=mysqli_fetch_array($i);
                
                $consulta2="SELECT * FROM clientes";
                $i2=mysqli_query($con,$consulta2);
  
                echo '<select name="cliente" id="cliente">';  
  
                  while($in2=mysqli_fetch_array($i2)){
                    echo'<option value="'.$in2["id_clientes"].'">'.$in2["nombre_cliente"].'</option>';
                  }
                echo '</select>';  
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Sección</label>
          <div>
            <?php
              $consulta="SELECT * FROM tareas";
              $i=mysqli_query($con,$consulta);
              $in=mysqli_fetch_array($i);  
  
              $consulta2="SELECT * FROM categorias";
              $i2=mysqli_query($con,$consulta2);
              echo '<select name="categoria" id="categoria">';  
                while($in2=mysqli_fetch_array($i2)){
                  echo'<option value="'.$in2["id_categoria"].'">'.$in2["categoria"].'</option>';
                }
              echo '</select>';  
            ?>
          </div> 
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Prioridad</label>
        <div>
          <?php
            $consulta="SELECT * FROM tareas";
            $i=mysqli_query($con,$consulta);
            $in=mysqli_fetch_array($i);
  
            $consulta2="SELECT * FROM prioridades";
            $i2=mysqli_query($con,$consulta2);
  
            echo '<select name="prioridad" id="prioridad">';  
              while($in2=mysqli_fetch_array($i2)){
                echo'<option value="'.$in2["id_prioridad"].'">'.$in2["nombre_prioridad"].'</option>';
              }
            echo '</select>';  
          ?>
        </div> 
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Tarea</label>
        <div>
          <textarea name="tarea" rows="1" cols="10"></textarea>
        </div>
        <br />
        <div class="form-group">
          <label for="exampleInputFile">Importe</label>
            <div>
              <textarea name="importe" rows="1" cols="10"></textarea>
            </div>
            <br />
            <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
        </form>
        </div><!-- widgetcontent-->
      </div><!-- widgetcontent-->
</div>

<!-- FIN  Formulario extraido de tareas para adaptarlo a un formulario de mensajes -->

  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="53" align="center" valign="top"><strong>ID</strong></td>
      <td width="426" align="center" valign="top"><strong>Asunto</strong></td>
      <td width="321" align="center" valign="top"><strong>De</strong></td>
	  <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
    </tr>
    <?php
	$i = 0; 
	while($row = mysql_fetch_assoc($res)){ ?>
    <tr bgcolor="<?php if($row['leido'] == "si") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#FFE7CE"; } else { echo "#FFCAB0"; } } ?>">
      <td align="center" valign="top"><?=$row['ID']?></td>
      <td align="center" valign="top"><a href="leer.php?id=<?=$row['ID']?>"><?=$row['asunto']?></a></td>
      <td align="center" valign="top"><?=$row['de']?></td>
	  <td align="center" valign="top"><?=$row['fecha']?></td>
    </tr>
<?php $i++; 
} ?>
</table>