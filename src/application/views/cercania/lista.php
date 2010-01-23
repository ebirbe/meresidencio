<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<table>
	<tr>
		<th colspan="3"><?php echo html_Core::specialchars($cabecera_tabla) ?></th>
	</tr>
	<?php foreach ($cercania as $fila) { ?>
	<tr>
		<td><?php echo html_Core::specialchars($fila->nombre) ?></td>
		<td><?php echo html_Core::anchor('cercania/editar/'.$fila->id, 'Editar') ?></td>
		<td><?php echo html_Core::anchor('cercania/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<?php } ?>
</table>
