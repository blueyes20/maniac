<form role="form" method="post" action="index.php?&sec=usuarios&view=finsertar">
	
<button class="btn btn-default" type="submit">Insertar Nuevo Usuario</button>
</form>
<br/>
<h1 id="titulin">Listado de usuarios</h1>
<br/>
<div id="tablap">

	<?php
		Listar_usuarios();
	?>

</div>