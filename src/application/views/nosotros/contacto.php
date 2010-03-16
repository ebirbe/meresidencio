<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Medios de Contacto</h2>
<p class="intro-text">Para cualquier duda, informacion o comentario
puedes contactar con nosotros a traves de los siguientes medios:</p>
<div class="clear"></div>
<table class="tabla_ext">
	<tr>
		<td>NOMBRE:</td>
		<td><?php echo form::input('nombre') ?></td>
	</tr>
	<tr>
		<td>CORREO:</td>
		<td><?php echo form::input ('correo') ?></td>
	</tr>
	<tr>
		<td>MENSAJE:</td>
		<td><?php echo form::textarea(array('name'=>'mensaje', 'cols'=>'50', 'rows'=>'5')) ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form::submit(array('class'=>'button'), 'Enviar') ?></td>
	</tr>
</table>
