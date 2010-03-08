<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Ciudades</h2>
<table class="tabla_alertas">
<?php foreach ($ciudad as $fila) { ?>
	<tr>
		<td rowspan="4"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><?php echo html_Core::anchor('ciudad/editar/'.$estado_id.'/'.$fila->id, 'Editar') ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('ciudad/borrar/'.$fila->id, 'Borrar') ?></td>
	</tr>
	<tr>
		<td><?php echo html_Core::anchor('zona/agregar/'.$fila->id, 'Ver Zonas') ?></td>
	</tr>
	<?php } ?>
</table>
