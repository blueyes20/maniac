<form role="form" method="post" action="index.php?&sec=prioridades&view=finsertar">
	<button class="btn btn-default" type="submit">Insertar Nueva Prioridad</button>
</form>
<br/>
<h1 id="titulin">Listado de Prioridades</h1>
<br/>
<div id="tablap">
	<?php
		Listar_prioridades();
	?>
</div>