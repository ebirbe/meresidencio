<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Estados</h2>
<table class="tabla_alertas">
	<?php foreach ($estado as $fila) { ?>
	<tr>
		<td rowspan="4"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><?php echo html_Core::anchor('estado/editar/'.$fila->id, 'Editar') ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('estado/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('ciudad/agregar/'.$fila->id, 'Ver Ciudades') ?></td>
	</tr>
	<?php } ?>
</table>
