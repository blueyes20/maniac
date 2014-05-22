<?php
  extract ($_GET);
  // EDITAMOS UNA TAREA
?>
  <div class="widget">
    <h4 class="widgettitle">Formulario de Edición</h4>
      <div class="widgetcontent">
        <form role="form" method="post" action="index.php?&sec=usuarios&view=editar">
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <div>
              <?php
              
                $consulta="SELECT * FROM usuarios WHERE codusu=".$id;
                $result=consulta_sql($con,$consulta);
                $a=mysqli_fetch_array($result);
              ?>
              <textarea name="nombreusu" rows="1" cols="10"><?php echo $a['nombreusu'] ?></textarea>
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="exampleInputFile">Nueva contraseña???</label>
            <div>
              <input type="password" name="contrasena" rows="1" cols="10"><?php #echo $a['contrasena'] ?></input> 
            </div>
            <br/>-->
            <div class="form-group">
              <label for="exampleInputFile">E-mail</label>
              <div>
                <textarea name="email" rows="1" cols="10"><?php echo $a['email'] ?></textarea>
              </div>
              <br/>
              <div class="form-group">
                <label for="exampleInputFile">Teléfono</label>
              <div>
                <textarea name="telef" rows="1" cols="10"><?php echo $a['telef'] ?></textarea>
              </div>
              <br /><br /><br/>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <button type="submit" name="OK" value="editar" class="btn btn-default">Enviar Cambios</button>
        </form>
        
        
        <div>
        
</div>
      </div><!-- widgetcontent-->
  </div><!-- widgetcontent-->
</div>
</div>