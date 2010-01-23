<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php if ($calificar){?>
<?php echo form::open()?>
<table>
	<tr>
		<th colspan="2">Calificar la operaci&oacute;n de Alquiler</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_Core::label('puntos', '&iquest;Qu&eacute; calificaci&oacute;n merece la operaci&oacute;n de alquiler?') ?></td>
	</tr>
	<tr>
		<td><?php echo Calificacion_Model::combobox_calificacion($formulario['puntos']); ?></td>
		<td><?php echo $errores['puntos']?></td>
	</tr>
	<tr>
		<td colspan="2">&iquest;Por qu&eacute; le das esta
		calificaci&oacute;n?</td>
	</tr>
	<tr>
		<td><?php echo form_Core::textarea('razon', $formulario['razon']); ?></td>
		<td><?php echo $errores['razon']?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_Core::submit(NULL,"Calificar") ?></td>
	</tr>
</table>
<?php echo form::close();?>
<?php }else{?>
<table>
	<tr>
		<th>Ya has calificado esta operaci&oacute;n</th>
	</tr>
</table>
<?php echo $vista_ya_califico; ?>
<?php } ?>

<br>
<?php echo html::anchor('usuario', '<- Volver') ?>