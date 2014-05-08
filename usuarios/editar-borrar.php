  <?php

//editar-borrar.php?id=1

// me va a venir el id de la tarea y tengo que poder:
// a) editarla
// b) borrarla

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
            <textarea name="nombre_cliente" rows="1" cols="10"><?php echo $a['nombreusu'] ?></textarea>
          <!--<input type="text" name="nombre_cliente" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo $a['nombre_cliente']?>">-->

            

                </div>
                </div>
                
                        <div class="form-group">
                            <label for="exampleInputFile">Nueva contraseña???</label>


    <div>
          <input type="password" name="contrasena" rows="1" cols="10"></input>
         <!-- <input type="text" name="telefono" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo $a['telefono']?>">   -->               
    </div>
    <br/>
                      
                        <div class="form-group">
                            <label for="exampleInputFile">E-mail</label>


    <div>
          <textarea name="email" rows="1" cols="10"><?php echo $a['email'] ?></textarea>
         <!-- <input type="text" name="telefono" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo $a['telefono']?>">   -->               
    </div>
    <br/>
                        
                      
                        <div class="form-group">
                            <label for="exampleInputFile">Teléfono</label>


    <div>
          <textarea name="telef" rows="1" cols="10"><?php echo $a['telef'] ?></textarea>
         <!-- <input type="text" name="telefono" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo $a['telefono']?>">   -->               
    </div>
    

                            
                        <br /><br />
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Editar</button>
                    </form>


                </div><!-- widgetcontent-->
            </div><!-- widgetcontent-->




      