<?php
    extract ($_GET);
?>
  <div class="widget">
    <h4 class="widgettitle">Formulario de Inserción de Nuevo Perfil</h4>
        <div class="widgetcontent">
            <form role="form" method="post" action="index.php?&sec=perfiles&view=insertar">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Perfil</label>
                    <div>      
                        <input name="nombre_perfil" rows="1" cols="10"></textarea>
                    </div>
                </div>
                
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Descripción:</label>
                        <div>
                            <textarea name="descripcion" rows="3" cols="10"></textarea>
                        </div>
                        <br/>
                        
                            <br />
                            <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
            </form>
        </div><!-- widgetcontent-->
  </div><!-- widgetcontent-->
</div>
</div>