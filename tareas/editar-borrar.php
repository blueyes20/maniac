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
                    <form role="form" method="post" action="index.php?&sec=tareas&view=editar">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cliente</label>
                          

                            <div>
                              
               
                <?php

                SelectAvanzSelecc($con,'tareas','num','cliente','clientes','id_clientes','nombre_cliente',$id);
              
                ?>

                </div>
                </div>
                <br/>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sección</label>

                              <div>
                              
    
    
    <?php
  
  SelectAvanzSelecc($con,'tareas','num','categoria','categorias','id_categoria','categoria',$id);

  ?>


    </div> 


                
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="exampleInputFile">Tarea</label>


<div>
    <?php
                $consulta="SELECT * FROM tareas WHERE num=".$id;
                $result=consulta_sql($con,$consulta);
                $a=mysqli_fetch_array($result);
                
  ?>
            <textarea name="tarea" rows="1" cols="10"><?php echo utf8_encode($a['tarea'])?></textarea>
          <!--<input type="text" name="tarea" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo utf8_encode($a['tarea'])?>"> -->                  
      
    </div>
    <div class="form-group">
                            <label for="exampleInputFile">Importe</label>


<div>
    <?php
               // $consulta="SELECT * FROM tareas WHERE num=".$id;
               // $result=consulta_sql($con,$consulta);
               // $a=mysqli_fetch_array($result);
                
  ?>
            <textarea name="importe" rows="1" cols="10"><?php echo utf8_encode($a['importe'])?></textarea>
          <!--<input type="text" name="tarea" class="form-control input-default" id="exampleInputEmail1" placeholder="<?php echo utf8_encode($a['tarea'])?>"> -->                  
      
    </div>
                    

                            
                        <br /><br />
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Editar</button>
                    </form>


                </div><!-- widgetcontent-->
            </div><!-- widgetcontent-->




      