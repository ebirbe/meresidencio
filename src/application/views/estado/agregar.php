<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open(NULL, array('method'=>'POST')) ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('estado','Estado') ?></td>
		<td><?php echo form::input('estado',$formulario['estado']) ?></td>
		<td><?php echo $errores['estado'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('estado', '<- Volver') ?>
