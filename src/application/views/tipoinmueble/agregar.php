<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>

<?php echo form::open() ?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('tipoinmueble','Tipo de Inmueble') ?></td>
		<td><?php echo form::input('tipoinmueble',$formulario['tipoinmueble']) ?></td>
		<td><?php echo $errores['tipoinmueble'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(NULL,'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<br>
<?php echo html::anchor('tipoinmueble', '<- Volver') ?>
