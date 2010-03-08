<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<tr>
	<td>#<?php echo $fila->id ?></td>
	<td><?php echo $fila->login ?></td>
	<td><?php echo $fila->nombre ?></td>
	<td><?php echo $fila->apellido ?></td>
	<td><?php echo $fila->correo ?></td>
	<td><a href="<?php echo url::site('usuario/datos_usuario/'.$fila->id)?>"><?php echo html_Core::image('media/img/iconos/arrow_right.png', array('class'=>'icono'))?></a></td>
</tr>
