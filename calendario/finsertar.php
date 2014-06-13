<?php
    #extract ($_GET);
    // EDITAMOS UNA TAREA
?>
  <div class="widget">
    <h4 class="widgettitle">Formulario de Inserción de Usuarios</h4>
        <div class="widgetcontent">
            <form role="form" method="post" action="index.php?&sec=calendario&view=insertar">
                <div class="form-group">
                    <label for="exampleInputFile">Descripción</label>
                            <div>
                                <textarea name="description" rows="2" cols="10"></textarea>
                            </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Fecha</label>
                    <!-- <p>Introduce una fecha con el siguiente formato: <strong>M/D/AAAA</strong> (6/9/2014; esto sería -> junio/9/2014)</p> -->
                    <p><input type="text" name="evdate" id="datepicker"></p>
                    <div>
                        <!-- <input name="evdate" rows="1" cols="10" required/> -->
                    </div>
                            <br /><br />
                            <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
            </form>
        </div><!-- widgetcontent-->
  </div><!-- widgetcontent-->
</div>
</div>