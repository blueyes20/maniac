<?php
    // me va a venir el id de la tarea y tengo que poder:
    // a) editarla
    // b) borrarla
    extract ($_GET);
    // EDITAMOS UNA TAREA
?>
<div class="widget">
    <h4 class="widgettitle">Formulario de Edición</h4>
        <div class="widgetcontent">
            <form role="form" method="post" action="index.php?&sec=perfiles&view=editar">
                <div class="form-group">
                    <label for="exampleInputFile">Perfil:</label>
                        <div>
                            <?php
                                $consulta="SELECT * FROM perfiles WHERE id_perfil=".$id;
                                $result=consulta_sql($con,$consulta);
                                $a=mysqli_fetch_array($result);
                
                            ?>
                            <textarea name="nombre_perfil" rows="1" cols="10"><?php echo utf8_encode($a['nombre_perfil'])?></textarea>              
                            <br/><br/>
                            
                </div>  
                   
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Editar</button>
            </form>
        </div><!-- widgetcontent-->
</div><!-- widgetcontent-->
</div>




      