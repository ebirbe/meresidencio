<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Suscripci&oacute;n</h2>
<p>Registrate totalmente GRATIS y disfruta de todos los servicios que te ofrecemos en <?php echo NOMBRE_SITIO ?>.</p>
<?php echo form::open() ?>
<table class="tabla_ext">
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3" class="msg_error"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td class="columna_titulos"><?php echo form::label('login', 'Usuario o Nickname:')?></td>
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
