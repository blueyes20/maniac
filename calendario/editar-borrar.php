<?php
  extract ($_GET);
  // EDITAMOS UNA TAREA
?>
  <div class="widget">
    <h4 class="widgettitle">Formulario de Edición</h4>
      <div class="widgetcontent">
        <form role="form" method="post" action="index.php?&sec=calendario&view=editar">
          <div class="form-group">
            <label for="exampleInputEmail1">Descripción Cita</label>
            <div>
              <?php
              
                $consulta="SELECT * FROM ecalendar.events WHERE id=".$id;
                $result=consulta_sql($con,$consulta);
                $a=mysqli_fetch_array($result);
              ?>
              <textarea name="description" rows="1" cols="10"><?php echo $a['description'] ?></textarea>
            </div>
          </div>
          
            <div class="form-group">
              <label for="exampleInputFile">Fecha</label>
              <!-- <p>Introduce una fecha con el siguiente formato: <strong>M/D/AAAA</strong> (6/9/2014; esto sería -> junio/9/2014)</p> -->
              <div>
                <p><input type="text" name="evdate" id="datepicker" value="<?php echo $a['evdate'] ?>"></p>
                <!-- <textarea name="evdate" rows="1" cols="10"><?php #echo $a['evdate'] ?></textarea> -->
              </div>
              <br/>
              
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