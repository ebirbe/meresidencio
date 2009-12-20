<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
//TODO Generar la vista de estado
//TODO Hacer la busqueda de estados
?>
<table>
	<tr>
		<th colspan="3"><?php echo html_Core::specialchars($cabecera_tabla) ?></th>
	</tr>
	<?php foreach ($servicio as $fila) { ?>
	<tr>
		<td><?php echo html_Core::specialchars($fila->nombre) ?></td>
		<td><?php echo html_Core::anchor('servicio/editar/'.$fila->id, 'Editar') ?></td>
		<td><?php echo html_Core::anchor('servicio/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<?php } ?>
</table>
