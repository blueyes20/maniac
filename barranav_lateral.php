<?php
$menu= ' ';
$content= ' ';

$num="SELECT * FROM prioridades";
$envio1=mysqli_query($con,$num);

$menu .= '<ul>';
while($prioridades=mysqli_fetch_assoc($envio1)){

$menu .= '<li><a href="#tabs-'.$prioridades["id_prioridad"].'">'.$prioridades["nombre_prioridad"].'</a></li>';
$content .=' <div id="tabs-'.$prioridades["id_prioridad"].'"><p>'.$prioridades["id_prioridad"].'</p></div>';

}

$menu .='</ul>';

echo '<div id="tabs">'.$menu,$content.'</div>';
?>