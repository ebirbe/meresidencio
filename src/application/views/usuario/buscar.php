<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open()?>
<table>
	<tr>
		<th colspan="2">Buscar Usuario</th>
	</tr>
	<tr>
		<td><?php echo form::input('buscar')?></td>
		<td><?php echo form::submit('submit', 'Buscar') ?></td>
	</tr>
</table>
<?php echo form::close()?>
<table>
	<tr>
		<th colspan="5">Resultados de la Busqueda</th>
	</tr>
	<tr>
		<th>LOGIN</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>CORREO</th>
		<th>OPCION</th>
	</tr>
	<?php foreach ($usuario as $fila) { ?>
	<tr>
		<td><?php echo $fila->login ?></td>
		<td><?php echo $fila->nombre ?></td>
		<td><?php echo $fila->apellido ?></td>
		<td><?php echo $fila->correo ?></td>
		<td><?php echo html_Core::anchor('usuario/editar/'.$fila->id, 'Ver') ?></td>
	</tr>
	<?php } ?>
</table>
