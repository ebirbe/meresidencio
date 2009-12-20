<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open() ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('cercania','Cercania:') ?></td>
		<td><?php echo form::input('cercania',$formulario['cercania']) ?></td>
		<td><?php echo $errores['cercania'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('cercania', '<- Volver') ?>
