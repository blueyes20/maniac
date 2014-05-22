<!-- Formulario extraido de tareas para adaptarlo a un formulario de mensajes -->
<div class="widget">
  <div align="center">
    <h3 id="titulin2">Mensaje Nuevo<img id="correo" src="images/mailread1.png" height="72" width="72"></h3>
    <br/>
  </div>
    <h4 class="widgettitle">Redacta un mensaje</h4>
      <div class="widgetcontent">
        <form role="form" method="post" action="index.php?&sec=mensajes&view=insertar-mensajes-nuevos">
          <div class="form-group">
            <label for="exampleInputEmail1">Para:</label>
            <div style="padding-top: 2px">
              
              <?php  
                $sql = "SELECT * FROM mensajes";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res); 

                #nombre del usuario actual:
                $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
                $b=mysqli_query($con,$select); 
                $matriz=mysqli_fetch_array($b);

                #Array de todos los usuarios que hay en el sistema
                $consulta2="SELECT * FROM usuarios";
                $i2=mysqli_query($con,$consulta2);
  
                echo '<select style="width: 155px" name="usu" id="usu">';  
  
                  while($in2=mysqli_fetch_array($i2)){
                    
                    echo'<option value="'.$in2["nombreusu"].'">'.$in2["nombreusu"].'</option>';

                  }
                echo '</select>';  
              ?>
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="de" value=<?=$matriz['nombreusu']?>>
          <div>
            
          </div> 
      </div>
      <div class="form-group">
        
        <div>
          
        </div> 
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Asunto:</label>
        <div>
          <input style="width: 155px" type="text" name="asunto" />
          <!-- <textarea name="tarea" rows="1" cols="10"></textarea> -->
        </div>
        <br />
        <div class="form-group">
          <label for="exampleInputFile">Mensaje:</label>
            <div>
              <textarea name="texto" rows="3" cols="10"></textarea>
            </div>
            <br />
            <button type="submit" name="OK" value="enviar" class="btn btn-default">Enviar</button>
        </form>
        </div><!-- widgetcontent-->
      </div><!-- widgetcontent-->
</div>

<!-- FIN  Formulario extraido de tareas para adaptarlo a un formulario de mensajes -->