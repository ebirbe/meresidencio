<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open(NULL, array('method'=>'POST')) ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('ciudad','Ciudad:') ?></td>
		<td><?php echo $nombreCiudad ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo form::label('zona','Zona:') ?></td>
		<td><?php echo form::input('zona',$formulario['zona']) ?></td>
		<td><?php echo $errores['zona'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('zona/index/'.$ciudad_id, '<- Volver') ?>
