<?php
extract ($_GET);
// EDITAMOS UNA TAREA
?>
  <div class="widget">
        <h4 class="widgettitle">Formulario de Edición</h4>
            <div class="widgetcontent">
                <form role="form" method="post" action="index.php?&sec=prioridades&view=editar">
  
                    <div class="form-group">
                        <label for="exampleInputFile">Prioridad</label>
                    <div>
                        <?php
                            $consulta="SELECT * FROM prioridades WHERE id_prioridad=".$id;
                            $result=consulta_sql($con,$consulta);
                            $a=mysqli_fetch_array($result);
                
                        ?>
                        <textarea name="nombre_prioridad" rows="1" cols="10"><?php echo utf8_encode($a['nombre_prioridad'])?></textarea>
                    </div>                               
                    <br /><br />
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <button type="submit" name="OK" value="editar" class="btn btn-default">Editar</button>
                </form>
            </div><!-- widgetcontent-->
</div><!-- widgetcontent-->




      