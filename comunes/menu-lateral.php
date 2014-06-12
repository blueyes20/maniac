<div class="leftpanel">
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">MI MENU</li>
                <li class="active"><a href="index.php"><span class="iconfa-laptop"></span>PORTADA</a></li>


                <!-- Comienzan los diferentes apartados-->

                <?php 

                #Tareas
                $select="SELECT menuid FROM menusu WHERE usuid='".$_SESSION['id_usuario']."'";
                $query = mysqli_query($con,$select); 
                
                while($menuid = mysqli_fetch_array($query)){
                     #$menuid['menuid'].'<br/>';
                    
                    if ($menuid['menuid']==1) {
                        #Tareas
                        menuTarea ();
                    }

                    if ($menuid['menuid']==2) {
                        #Clientes
                        menuCliente ();
                    }

                    if ($menuid['menuid']==3) {
                        #Configuración
                        menuConfig ();
                    }

                    if ($menuid['menuid']==4) {
                        #Usuarios
                        menuUsu ();
                    }

                    if ($menuid['menuid']==5) {
                        #Mensajes
                        menuMensaje ();
                    }

                    if ($menuid['menuid']==6) {
                        #calendario
                        # Inicio Calendario -->
                        echo '<li class="dropdown"><a href=""><span class="iconfa-calendar"></span> Calendario</a>
                           <ul>
                             <li><a href="index.php?&sec=calendario&view=calendario"> Ver Calendario</a></li> 
                             <li><a href="index.php?&sec=calendario&view=finsertar"> Nueva Cita</a></li>
                           </ul>
                        </li>';
               
                       #Fin TCalendario -->
                    }

                    
                }

                    
                ?>
               
                

                 <!-- Terminan los diferentes apartados-->
            </ul> 
        </div>
</div>