<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Cambiar Clave</h2>
<?php echo form::open() ?>
<table class="tabla_ext">
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('actual', 'Contrase&ntilde;a Actual:')?></td>
		<td><?php echo form::password('actual')?></td>
		<td><?php echo $errores['actual']?></td>
	</tr>
	<tr>
		<td><?php echo form::label('nueva', 'Contrase&ntilde;a Nueva:')?></td>
		<td><?php echo form::password('nueva')?></td>
		<td><?php echo $errores['nueva']?></td>
	</tr>
	<tr>
		<td><?php echo form::label('confirmacion', 'Confirmaci&oacute;n:')?></td>
		<td><?php echo form::password('confirmacion')?></td>
		<td><?php echo $errores['confirmacion']?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Cambiar Clave')?></td>
	</tr>
</table>
	<?php echo form::close() ?>