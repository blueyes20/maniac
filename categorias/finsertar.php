<?php

//editar-borrar.php?id=1

// me va a venir el id de la tarea y tengo que poder:
// a) editarla
// b) borrarla

extract ($_GET);

// EDITAMOS UNA TAREA
?>
  <div class="widget">
                <h4 class="widgettitle">Introduce Nueva Categoría</h4>
                <div class="widgetcontent">
                    <form role="form" method="post" action="index.php?&sec=categorias&view=insertar">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Categoría:</label>
                          
                            <div>
                              
            <textarea name="categoria" rows="1" cols="10"></textarea>
                

                </div>
                </div>
            
    

                            
                        <br /><br />
                        <!--<input type="hidden" name="id" value="<?php echo $id; ?>"/>-->
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
                    </form>


                </div><!-- widgetcontent-->
            </div><!-- widgetcontent-->