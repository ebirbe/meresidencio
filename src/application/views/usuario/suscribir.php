<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Suscripci&oacute;n</h2>
<?php echo Kohana::debug($errores)?>
<?php echo form::open() ?>
<table class="tabla_ext">
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3" class="msg_error"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('nombre:', 'Nombre:')?></td>
		<td><?php echo form_Core::input('nombre', $formulario['nombre'])?></td>
		<td><?php echo $errores['nombre'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('apellido', 'Apellido:')?></td>
		<td><?php echo form::input('apellido', $formulario['apellido'])?></td>
		<td><?php echo $errores['apellido'] ?></td>
	</tr>
	<tr>
		<td width="200"><?php echo form::label('usuario', 'Usuario:')?></td>
		<td><?php echo form::input('login', $formulario['login'])?></td>
		<td><?php echo $errores['login'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('clave', 'Contrase&ntilde;a:')?></td>
		<td><?php echo form::password('clave', $formulario['clave'])?></td>
		<td><?php echo $errores['clave'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('confirmacion', 'Confirme su contrase&ntilde;a:')?></td>
		<td><?php echo form::password('confirmacion', $formulario['confirmacion'])?></td>
		<td><?php echo $errores['confirmacion'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('correo', 'Correo Electronico:')?></td>
		<td><?php echo form::input('correo', $formulario['correo'])?></td>
		<td><?php echo $errores['correo'] ?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Registrar!')?></td>
	</tr>
</table>
	<?php echo form::close() ?>
