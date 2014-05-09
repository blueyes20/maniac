<?php

//editar-borrar.php?id=1

// me va a venir el id de la tarea y tengo que poder:
// a) editarla
// b) borrarla

extract ($_GET);

// EDITAMOS UNA TAREA
?>
  <div class="widget">
                <h4 class="widgettitle">Formulario de Inserción de Usuarios</h4>
                <div class="widgetcontent">
                    <form role="form" method="post" action="index.php?&sec=usuarios&view=insertar">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                          
                            <div>
                              
            <textarea name="nombreusu" rows="1" cols="10"></textarea>
                

                </div>
                </div>
              
                        <div class="form-group">
                            <label for="exampleInputFile">Contraseña</label>


<div>
    
          <input type=password name="contrasena" rows="1" cols="10"></input>
        
    </div>
    <br/>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">E-mail</label>


<div>
    
          <textarea name="email" rows="1" cols="10"></textarea>
        
    </div>
    <br/>
    <div class="form-group">
                            <label for="exampleInputFile">Teléfono</label>


<div>
    
          <textarea name="telef" rows="1" cols="10"></textarea>
        
    </div>

                            
                        <br /><br />
                        <!--<input type="hidden" name="id" value="<?php echo $id; ?>"/>-->
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
                    </form>


                </div><!-- widgetcontent-->
            </div><!-- widgetcontent-->
        </div>
    </div>