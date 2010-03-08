<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Zonas</h2>
<table class="tabla_alertas">
	<?php foreach ($zona as $fila) { ?>
	<tr>
		<td rowspan="3"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('zona/editar/'.$fila->ciudad_id.'/'.$fila->id, 'Editar') ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('zona/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<?php } ?>
</table>
