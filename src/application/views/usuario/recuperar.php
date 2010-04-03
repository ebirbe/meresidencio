<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Recuperacion de Contraseña</h2>
<p>Por favor indica la direccion de correo electronico con la cual te
suscribiste y a la cual enviaremos tus datos de acceso.</p>
<?php echo form::open() ?>
<table class="tabla_ext">
<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('correo', 'Correo Electr&oacute;nico:')?></td>
	</tr>
	<tr>
		<td><?php echo form::input('correo',$formulario['correo'])?></td>
		<td><?php echo $errores['correo']?></td>
	</tr>
	<tr>
		<td><?php echo $captcha ?> <br/>
		<?php echo form::label('captcha', 'Escriba el texto que ve en la imagen:')?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo form::input('captcha')?></td>
		<td><?php echo $errores['captcha']?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Recuperar Clave')?></td>
	</tr>
</table>
		<?php echo form::close() ?>