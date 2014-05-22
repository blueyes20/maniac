<?php
  extract ($_GET);
  // EDITAMOS UNA TAREA
?>
  <div class="widget">
    <h4 class="widgettitle">Formulario Nueva Contraseña</h4>
      <div class="widgetcontent">
        <!-- Inicio php para saber el usuario que ha iniciado la sesión-->
        <?php

                          
                                $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
                                $b=mysqli_query($con,$select); 
                                $matriz=mysqli_fetch_array($b);
                                        
                            ?>
                            <!-- Fin de los datos del usuario -->
        
       

        <form role="form" method="post" action="index.php?&sec=usuarios&view=insertar-contrasena">
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        
            <label for="exampleInputEmail1">Nueva contraseña:</label>
            <div>
            <input type="password" name="usuario_clave" maxlength="15" /><br />
          </div>
            <label for="exampleInputEmail1">Confirmar:</label>
            <div>
            <input type="password" name="usuario_clave_conf" maxlength="15" /><br />
          </div>
          
      

              <br />
                <!-- <input type="hidden" name="id" value="<?php #echo $id; ?>"/> -->
                
                <button type="submit" name="enviar" value="editar" class="btn btn-default">Enviar Cambios</button>
                </div>
        </form>
        
      </div><!-- widgetcontent-->
  </div><!-- widgetcontent-->
</div>
</div>