<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th colspan="5">Mis Alertas</th>
	</tr>
	<?php foreach($alertas as $fila){?>
	<tr>
		<td rowspan="2"><?php echo $fila->estado->nombre ?></td>
		<td rowspan="2"> &gt;&gt; <?php echo $fila->ciudad->nombre ?></td>
		<td rowspan="2"> &gt;&gt; <?php echo $fila->zona->nombre ?></td>
		<td rowspan="2"> &gt;&gt; <?php echo $fila->tipoinmueble->nombre ?></td>
		<td><?php echo html::anchor('alerta/consultar/'.$fila->id, 'Consultar') ?></td>
	</tr>
	<tr>
		<td><?php echo html::anchor('alerta/eliminar/'.$fila->id, 'Eliminar') ?></td>
	</tr>
	<?php }?>
</table>
