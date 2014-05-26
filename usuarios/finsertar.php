<?php
    #extract ($_GET);
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
                        <input type="password" name="contrasena" rows="1" cols="10"></input>
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
                            <br/>
                            <label for="exampleInputFile">Elige Menu para este usuario:</label>
                            
                            <p>
                            <label>
                                <input type="checkbox" name="elmenu1" value="1" id="CheckboxGroup1_0" />
                                Tareas</label>
                                <br />
                            <label>
                                <input type="checkbox" name="elmenu2" value="2" id="CheckboxGroup1_1" />
                                Clientes</label>
                                <br />
                            <label>
                                <input type="checkbox" name="elmenu3" value="3" id="CheckboxGroup1_1" />
                                Configuración</label>
                                <br />
                            <label>
                                <input type="checkbox" name="elmenu4" value="4" id="CheckboxGroup1_1" />
                                Usuarios</label>
                                <br />
                            <label>
                                <input type="checkbox" name="elmenu5" value="5" id="CheckboxGroup1_1" />
                                Mensajes</label>
                                <br />
                            </p>
                            <br /><br />
                            <button type="submit" name="OK" value="editar" class="btn btn-default">Insertar</button>
            </form>
        </div><!-- widgetcontent-->
  </div><!-- widgetcontent-->
</div>
</div>