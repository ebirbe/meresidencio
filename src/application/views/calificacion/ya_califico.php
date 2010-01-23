<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th>&iquest;Qu&eacute; calificaci&oacute;n merece la
		operaci&oacute;n de alquiler?</th>
	</tr>
	<tr>
		<td><strong><?php echo ORM::factory('usuario', $calificacion->cliente_id)->login ?> dijo:</strong> <?php echo Calificacion_Model::$calif_lista[$calificacion->puntos]?></td>
	</tr>
	<tr>
		<th>&iquest;Por qu&eacute; le das esta
		calificaci&oacute;n?</th>
	</tr>
	<tr>
		<td><strong><?php echo ORM::factory('usuario', $calificacion->cliente_id)->login ?> dijo:</strong> <?php echo $calificacion->razon ?></td>
	</tr>
	<?php if($calificacion->respuesta != ''){?>
	<tr>
		<th>Respuesta del propietario:</th>
	</tr>
	<tr>
		<td><strong><?php echo ORM::factory('usuario', $calificacion->usuario_id)->login ?> dijo:</strong> <?php echo $calificacion->respuesta ?></td>
	</tr>
	<?php }?>
</table>