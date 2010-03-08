<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open() ?>
<h2>Iniciar Sesi&oacute;n</h2>
<table class="tabla_ext">
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3" class="msg_error"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td class="columna_titulos"><?php echo form::label('usuario', 'Usuario:')?></td>
		<td><?php echo form::input('login')?></td>
	</tr>
	<tr>
		<td><?php echo form::label('clave', 'Contrase&ntilde;a:')?></td>
		<td><?php echo form::password('clave')?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Iniciar Sesion')?></td>
	</tr>
	<tr>
		<td colspan="3"><a href=''><?php echo html_Core::image('media/img/iconos/key_delete.png', array('class'=>'icono'))?>&iquest;Olvid&oacute; su contrase&ntilde;a?</a></td>
	</tr>
</table>
	<?php echo form::close() ?>
