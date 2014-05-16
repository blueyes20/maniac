<form role="form" method="post" action="index.php?&sec=categorias&view=finsertar">
	<button class="btn btn-default" type="submit">Insertar Nueva Categoría</button>
</form>
<br/>
<h1 id="titulin">Listado de Categorías</h1>
<br/>
	<div id="tablap">

		<?php
			Listar_categorias();
		?>

	</div>