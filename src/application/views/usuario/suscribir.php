<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open() ?>
<table>
	<tr>
		<th colspan="3">Suscripci&oacute;n</th>
	</tr>
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('usuario', 'Usuario:')?></td>
		<td><?php echo form::input('login', $formulario['login'])?></td>
		<td><?php echo $errores['login'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('clave', 'Contrase&ntilde;a:')?></td>
		<td><?php echo form::password('clave', $formulario['clave'])?></td>
		<td><?php echo $errores['clave'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('correo', 'Correo Electronico:')?></td>
		<td><?php echo form::input('correo', $formulario['correo'])?></td>
		<td><?php echo $errores['correo'] ?></td>
	</tr>
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
		<td colspan="3"><?php echo form::submit('sibmit', 'Registrar!')?></td>
	</tr>
</table>
	<?php echo form::close() ?>
