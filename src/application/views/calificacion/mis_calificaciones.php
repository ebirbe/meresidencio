<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th colspan="2">Mis Calificaciones</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
	<?php foreach ($calificaciones as $fila) { ?>
	<?php
	if($fila->respuesta == ''){
		$link = "Responder";	
	}else{
		$link = "Ver";
	}
	?>
	<tr>
		<td>Fecha:</td>
		<td><?php echo $fila->fecha; ?></td>
	</tr>
	<tr>
		<td>Cod. de Publicaci&oacute;n:</td>
		<td><?php echo $fila->publicacion_id; ?></td>
	</tr>
	<tr>
		<td>Cliente:</td>
		<td><?php echo ORM::factory('usuario', $fila->cliente_id)->nombre; ?></td>
	</tr>
	<?php if($fila->puntos > 0){?>
	<tr>
		<td>Calificaci&oacute;n:</td>
		<td><?php echo Calificacion_Model::$calif_lista[$fila->puntos]; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo html::anchor('calificacion/responder_calificacion/'.$fila->id, $link) ?></td>
	</tr>
	<?php }else{?>
	<tr>
		<td colspan="2">El cliente aun no ha calificado la operaci&oacute;n.</td>
	</tr>
	<?php }//FIN IF?>
	<tr>
		<td colspan="2">
		<hr>
		</td>
	</tr>
	<?php }//FIN FOREACH ?>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
</table>

<br>
	<?php echo html::anchor('usuario', '<- Volver') ?>