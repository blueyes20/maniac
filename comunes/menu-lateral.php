<div class="leftpanel">
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">MI MENU</li>
                <li class="active"><a href="index.php"><span class="iconfa-laptop"></span>PORTADA</a></li>


                <!-- Comienzan los diferentes apartados-->

                <?php 
                #Tareas
                $select='SELECT * FROM menusu WHERE usuid='.$_SESSION['id_usuario'];
                $b = mysqli_query($con,$select); 
                $matriz = mysqli_fetch_array($b);
                $matriz2=matriz['']
                
                switch ($matriz2) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }($menu==1) {
                    menuTarea ();
                }
                
                ?>
                

                <?php 
                #Clientes
                menuCliente ();

                ?>
                

                <?php 
                #Configuración
                menuConfig ();

                ?>
                

                <?php 
                #Usuarios
                menuUsu ();

                ?>
                

                 <?php 
                #Mensajes
                menuMensaje ();

                ?>
                

                 <!-- Terminan los diferentes apartados-->
            </ul> 
        </div>
</div>