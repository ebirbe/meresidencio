<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
<?php if ($calificar){?>
<?php echo form::open()?>
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
	<?php echo form::close()?>
	<?php }else{?>
	<tr>
		<th>Ya has calificado esta operaci&oacute;n</th>
	</tr>
	<tr>
		<th>&iquest;Qu&eacute; calificaci&oacute;n merece la
		operaci&oacute;n de alquiler?</th>
	</tr>
	<tr>
		<td><?php echo Calificacion_Model::$calif_lista[$calificacion->puntos]?></td>
	</tr>
	<tr>
		<th>&iquest;Por qu&eacute; le das esta
		calificaci&oacute;n?</th>
	</tr>
	<tr>
		<td><?php echo $calificacion->razon ?></td>
	</tr>
	<tr>
		<th>Respuesta del propietario:</th>
	</tr>
	<tr>
		<td><?php echo $calificacion->respuesta ?></td>
	</tr>
	<?php }?>
</table>

<br>
	<?php echo html::anchor('usuario', '<- Volver') ?>