<form role="form" method="post" action="index.php?&sec=perfiles&view=finsertar">
	<button class="btn btn-default" type="submit">Insertar Nuevo Perfil</button>
</form>
<br/>
<h1 id="titulin">Listado de perfiles</h1>
<br/>
<div id="tablap">
	<?php
		Listar_perfiles();
	?>
</div>