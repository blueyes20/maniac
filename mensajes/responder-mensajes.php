<div align="center">
    <h3 id="titulin2">Responder al Mensaje<img id="correo" src="images/mailread1.png" height="72" width="72"></h3>
    <br/>
  </div>
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