<?php 
  #nombre del usuario actual:
      $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
        $b=mysqli_query($con,$select); 
        $matriz=mysqli_fetch_array($b);
  # Obtenemos el mensaje privado
      $id = $_GET['id'];
      $sql = "SELECT * FROM mensajes WHERE para='".$matriz['nombreusu']."' AND ID='".$id."'";
      $res = mysqli_query($con, $sql) or die(mysql_error());
      $row = mysqli_fetch_assoc($res);
?>

<div class="widget">
    <h4 class="widgettitle">Mensaje escrito por: <?=$row['de']?></h4>
      <div class="widgetcontent">
    <p class="blue2">Fecha y hora:</p><?=$row['fecha']?><br />
    <p class="blue2">Asunto:</p><?=$row['asunto']?><br />
    <p class="blue2">Mensaje:</p>
    <?=$row['texto']?>
    <?php 
      # Avisamos que ya lo leimos
      if($row['leido'] != "si"){
        mysqli_query($con, "UPDATE mensaje SET leido='si' WHERE ID='".$id."'");
      }
    ?>
      </div><!-- widgetcontent-->
</div><!-- widgetcontent-->
<br/>

<!-- FORMULARIO PARA CREAR UN MENSAJE DE RESPUESTA -->
<div class="widget">
    <h4 class="widgettitle">Redactar Respuesta De: <strong><?=$row['para']?><strong></h4>
      <div class="widgetcontent">
        <?php
                 # Obtenemos el mensaje privado
                $id = $_GET['id'];
                $sql = "SELECT * FROM mensajes WHERE para='".$matriz['nombreusu']."' AND ID='".$id."'";
                $res = mysqli_query($con, $sql) or die(mysql_error());
                $row = mysqli_fetch_assoc($res);
                //variables
                $de=$row['de'];
                $para=$row['para'];
          echo '<form role="form" method="post" action="index.php?&sec=mensajes&view=insertar-mensajes">';
        ?>
          <div class="form-group">
            
            <div>
              <?php 
                #nombre del usuario actual:
                $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
                $b=mysqli_query($con,$select); 
                $matriz=mysqli_fetch_array($b);
               

                
              ?>
              <p class="blue">Para:</p><?=$row['de']?><br />
              <input type="hidden" name="para" value=<?=$row['de']?>>
              <p class="blue">De:</p><?=$row['para']?><br />
              <input type="hidden" name="de" value=<?=$row['para']?>>
              <p class="blue">Asunto:</p>
                <textarea name="asunto" rows="1">RE: <?php echo utf8_encode($row['asunto'])?></textarea>
                
              <p class="blue">Mensaje:</p>
              <textarea name="texto"></textarea>
<br />
            </div>
          </div>
          
            <br />
            <button type="submit" name="OK" value="editar" class="btn btn-default">Enviar Respuesta</button>
        </form>
        </div><!-- widgetcontent-->
      </div><!-- widgetcontent-->

<!-- FIN FORMULARIO PARA CREAR UN MENSAJE DE RESPUESTA -->


<!-- Botón para crear mensaje -->
<form role="form" method="post" action="index.php?&sec=mensajes&view=crear-mensajes">
  <button class="btn btn-default" type="submit">Crear Nuevo Mensaje</button>
 </form>
</div>
</div>

<?php 
# Incluimos la configuracion
include('config.php'); 
session_start();
if($_SESSION['logueado'] != "SI"){
header('location: index.php');
exit();
}
if($_POST['enviar'])
{
	if(!empty($_POST['para']) && !empty($_POST['asunto']) && !empty($_POST['texto']))
	{
		$fecha = date("j/m/Y, g:i a");
		$sql = "INSERT INTO mensaje (para,de,fecha,asunto,texto) VALUES ('".$_POST['para']."','".$_SESSION['usuario']."','".$fecha."','".$_POST['asunto']."','".$_POST['texto']."')";
		mysql_query($sql,$link);
		echo "Mensaje enviado correctamente.";
	}
}
?>
Menu: <a href="listar.php">Ver mensajes</a> | <a href="crear.php">Crear mensajes</a> | <a href="cerrar.php">Cerrar sesion</a><br /><br />

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


<form method="post" action="" >
<center><strong>Usuarios para la pruba: marcofbb, entra-ya, dedydamy</strong></center></<br /><br />
Para:<br />
<input type="text" name="para" /><br />
Asunto:<br />
<input type="text" name="asunto" /><br />
Mensaje:<br />
<textarea name="texto"></textarea>
<br /><br />
<input type="submit" name="enviar" value="Enviar" />
</form>