<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Estados</h2>
<table class="tabla_alertas">
	<?php foreach ($estado as $fila) { ?>
	<tr>
		<td rowspan="4"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><a href='<?php echo url::site('estado/editar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/table_edit.png', array('class'=>'icono'))?>Editar</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('estado/borrar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono'))?>Borrar</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('ciudad/agregar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/arrow_right.png', array('class'=>'icono'))?>Ciudades</a></td>
	</tr>
	<?php } ?>
</table>
