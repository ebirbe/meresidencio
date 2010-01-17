<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open() ?>
<table>
	<tr>
		<th colspan="3">Iniciar Sesi&oacute;n</th>
	</tr>
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('usuario', 'Usuario:')?></td>
		<td><?php echo form::input('login')?></td>
	</tr>
	<tr>
		<td><?php echo form::label('clave', 'Contrase&ntilde;a:')?></td>
		<td><?php echo form::password('clave')?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit('sibmit', 'Iniciar Sesion')?></td>
	</tr>
	<tr>
		<td colspan="3"><a href=''>&iquest;Olvid&oacute; su contrase&ntilde;a?</a></td>
	</tr>
</table>
	<?php echo form::close() ?>
