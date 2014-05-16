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
            <form role="form" method="post" action="index.php?&sec=clientes&view=editar">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                        <div>
                            <?php
                                 $consulta="SELECT * FROM clientes WHERE id_clientes=".$id;
                                 $result=consulta_sql($con,$consulta);
                                 $a=mysqli_fetch_array($result);         
                             ?>
                                <textarea name="nombre_cliente" rows="1" cols="10"><?php echo $a['nombre_cliente'] ?></textarea>
                        </div>
                </div>
                <br/>
                <br/>
                        <div class="form-group">
                            <label for="exampleInputFile">Teléfono</label>
                            <div>
                                <?php
                                    $consulta="SELECT * FROM clientes WHERE id_clientes=".$id;
                                    $result=consulta_sql($con,$consulta);
                                    $a=mysqli_fetch_array($result);             
                                ?>
                                 <textarea name="telefono" rows="1" cols="10"><?php echo $a['telefono'] ?></textarea>                
                            </div>   
                            <br /><br />
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Editar</button>
            </form>


        </div><!-- widgetcontent-->
</div><!-- widgetcontent-->