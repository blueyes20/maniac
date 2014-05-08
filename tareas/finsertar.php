<?php

//editar-borrar.php?id=1

// me va a venir el id de la tarea y tengo que poder:
// a) editarla
// b) borrarla

extract ($_GET);

// EDITAMOS UNA TAREA
?>
  <div class="widget">
                <h4 class="widgettitle">Formulario de Inserción de Tarea</h4>
                <div class="widgetcontent">
                    <form role="form" method="post" action="index.php?&sec=tareas&view=insertar">
                        <div class="form-group">

                            <label for="exampleInputEmail1">Cliente</label>
                          
                            <div>
                              
            <?php

                //SelectAvanzado($con,'tareas','num','cliente','clientes','id_clientes','nombre_cliente')
                $consulta="SELECT * FROM tareas";
  $i=mysqli_query($con,$consulta);
  $in=mysqli_fetch_array($i);
  //$inn=$in["$etiqueta"];
  
  $consulta2="SELECT * FROM clientes";
  $i2=mysqli_query($con,$consulta2);
  
  echo '<select name="cliente" id="cliente">';  
  
  while($in2=mysqli_fetch_array($i2)){
    echo'<option value="'.$in2["id_clientes"].'">'.$in2["nombre_cliente"].'</option>';
  }
  echo '</select>';  

              
                ?>
                

                </div>
                </div>
                
                <div class="form-group">
                            <label for="exampleInputPassword1">Sección</label>

                              <div>
                              
    
    
    <?php
  
  //SelectAvanzSelecc($con,'tareas','num','categoria','categorias','id_categoria','categoria',$id);
  //Listar($con,'tareas','num','categoria','categorias','id_categoria','categoria')
    $consulta="SELECT * FROM tareas";
  $i=mysqli_query($con,$consulta);
  $in=mysqli_fetch_array($i);
  //$inn=$in["$etiqueta"];
  
  $consulta2="SELECT * FROM categorias";
  $i2=mysqli_query($con,$consulta2);
  
  echo '<select name="categoria" id="categoria">';  
  
  while($in2=mysqli_fetch_array($i2)){
    echo'<option value="'.$in2["id_categoria"].'">'.$in2["categoria"].'</option>';
  }
  echo '</select>';  

  ?>


    </div> 


                
                        </div>
                    
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Prioridad</label>

                              <div>
                              
    
    
    <?php
  
  //SelectAvanzSelecc($con,'tareas','num','categoria','categorias','id_categoria','categoria',$id);
  //Listar($con,'tareas','num','prioridad','prioridades','id_prioridad','nombre_prioridad')
    $consulta="SELECT * FROM tareas";
  $i=mysqli_query($con,$consulta);
  $in=mysqli_fetch_array($i);
  //$inn=$in["$etiqueta"];
  
  $consulta2="SELECT * FROM prioridades";
  $i2=mysqli_query($con,$consulta2);
  
  echo '<select name="prioridad" id="prioridad">';  
  
  while($in2=mysqli_fetch_array($i2)){
    echo'<option value="'.$in2["id_prioridad"].'">'.$in2["nombre_prioridad"].'</option>';
  }
  echo '</select>';  

  ?>


    </div> 


                
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Tarea</label>


<div>
    
          <textarea name="tarea" rows="1" cols="10"></textarea>
        
    </div>
    

                            
                        <br />
 <div class="form-group">
                            <label for="exampleInputFile">Importe</label>


<div>
    
          <textarea name="importe" rows="1" cols="10"></textarea>
        
    </div>
                        <br />
                        <!--<input type="hidden" name="id" value="<?php echo $id; ?>"/>-->
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
                    </form>


                </div><!-- widgetcontent-->
            </div><!-- widgetcontent-->
          </div>