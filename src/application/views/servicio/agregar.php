<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open() ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('servicio','Servicio:') ?></td>
		<td><?php echo form::input('servicio',$formulario['servicio']) ?></td>
		<td><?php echo $errores['servicio'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('servicio', '<- Volver') ?>
