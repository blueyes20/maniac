<form role="form" method="post" action="index.php?&sec=mensajes&view=crear-mensajes">
  <button class="btn btn-default" type="submit">Crear Nuevo Mensaje</button>
  <div align="center">
    <p><img src="images/mensaje.png" height="58" width="316"></p>
  </div>
</form>
<br/>
<br/>
<table width="100%" border="0">
  <thead>
    <tr>
      <th width="5%" align="center">ID</th>
      <th width="15%" align="center">Asunto</th>
      <th width="15%" align="center">De</th>
      <th width="15%" align="center">Fecha</th>
      <th width="10%" align="center">Borrar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      #Listar en una tabla los mensajes para el usuario conectado mediante la siguiente función:
      
      #nombre del usuario actual:
      $select='SELECT * FROM usuarios WHERE codusu='.$_SESSION['id_usuario'];
      $b=mysqli_query($con,$select); 
      $matriz=mysqli_fetch_array($b);

      //mensajes (otra tabla) ordenados de manera que los no leídos aparecen arriba:
      $consulta="SELECT * FROM mensajes WHERE para='".$matriz['nombreusu']."' ORDER BY leido";
      $result=mysqli_query($con,$consulta);
   
      $i=0;
      while($info=mysqli_fetch_assoc($result)){ ?>
        <tr bgcolor="<?php if($info["leido"] == "si") { echo "#FFE8E8"; } else { echo "#E8FFE8"; } ?>">
        <?php
        echo "<td width='3%' >".utf8_encode ($info["ID"])."</td>";
        echo "<td width='15%' ><a href='index.php?&sec=mensajes&view=leer-mensajes&id=".$info["ID"]."'>".utf8_encode ($info["asunto"])."</td>";
        echo "<td width='15%' >".utf8_encode ($info["de"])."</td>";
        echo "<td width='15%' >".utf8_encode ($info["fecha"])."</td>";
        echo "<td width='7%' ><a href='index.php?&sec=mensajes&view=borrar-mensajes&id=".$info["ID"]."'><img src='images/delete.png' width='16' height='16' /></a></td></tr>";
        echo"</tr>";
      $i++;
      }
    
    ?>
  </tbody>
</table>  