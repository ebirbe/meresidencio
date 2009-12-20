<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open(NULL, array('method'=>'POST')) ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('estado','Estado:') ?></td>
		<td><?php echo $nombreEstado ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo form::label('ciudad','Ciudad:') ?></td>
		<td><?php echo form::input('ciudad',$formulario['ciudad']) ?></td>
		<td><?php echo $errores['ciudad'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('ciudad/index/'.$estado_id, '<- Volver') ?>
