<?php
    //editar-borrar.php?id=1
    // me va a venir el id de la tarea y tengo que poder:
    // a) editarla
    // b) borrarla
    extract ($_GET);
    // EDITAMOS UNA TAREA
?>
    <div class="widget">
                <h4 class="widgettitle">Formulario de Inserción</h4>
                <div class="widgetcontent">
                    <form role="form" method="post" action="index.php?&sec=clientes&view=insertar">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cliente</label>
                          
                                <div>
                              
                                    <textarea name="nombre_cliente" rows="1" cols="10"></textarea>
                

                                </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="exampleInputFile">Teléfono</label>
                            <div>
                                <textarea name="telefono" rows="1" cols="10"></textarea>
                            </div>
                            <br />
                            <br />
                        <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
                    </form>
                </div><!-- widgetcontent-->
    </div><!-- widgetcontent-->