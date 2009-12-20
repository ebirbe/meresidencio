<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
//TODO Generar la vista de estado
//TODO Hacer la busqueda de estados
?>
<table>
	<tr>
		<th colspan="3"><?php echo html_Core::specialchars($cabecera_tabla) ?></th>
	</tr>
	<?php foreach ($zona as $fila) { ?>
	<tr>
		<td><?php echo html_Core::specialchars($fila->nombre) ?></td>
		<td><?php echo html_Core::anchor('zona/editar/'.$fila->ciudad_id.'/'.$fila->id, 'Editar') ?></td>
		<td><?php echo html_Core::anchor('zona/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<?php } ?>
</table>
