<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Medios de Contacto</h2>
<p class="intro-text">Para cualquier duda, informacion o comentario
puedes contactar con nosotros a traves de los siguientes medios:</p>
<div class="clear"></div>
<?php echo form::open() ?>
<table class="tabla_ext">
	<tr>
		<td colspan="3"><?php echo $mensaje ?></td>
	</tr>
	<tr>
		<td><?php echo form::label("nombre", "Nombre")?></td>
		<td><?php echo form::input('nombre', $formulario['nombre']) ?></td>
		<td><?php echo $errores['nombre'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label("nombre", "Correo")?></td>
		<td><?php echo form::input ('correo', $formulario['correo']) ?></td>
		<td><?php echo $errores['correo'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label("nombre", "Mensaje")?></td>
		<td><?php echo form::textarea(array('name'=>'mensaje', 'cols'=>'50', 'rows'=>'5'), $formulario['mensaje']) ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2"><?php echo $captcha ?> <br/>
		<?php echo form::label('captcha', 'Escriba el texto que ve en la imagen:')?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::input('captcha')?></td>
		<td><?php echo $errores['captcha']?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Enviar') ?></td>
	</tr>
</table>
		<?php echo form::close() ?>
