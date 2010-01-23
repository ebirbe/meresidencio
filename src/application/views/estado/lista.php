<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<table>
	<tr>
		<th colspan="3"><?php echo html_Core::specialchars($cabecera_tabla) ?></th>
	</tr>
	<?php foreach ($estado as $fila) { ?>
	<tr>
		<td><?php echo html_Core::specialchars($fila->nombre) ?></td>
		<td><?php echo html_Core::anchor('estado/editar/'.$fila->id, 'Editar') ?></td>
		<td><?php echo html_Core::anchor('estado/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<?php } ?>
</table>
