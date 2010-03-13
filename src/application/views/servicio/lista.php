<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Comodidades</h2>
<table class="tabla_alertas">
	<?php foreach ($servicio as $fila) { ?>
	<tr>
		<td rowspan="3"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><a href='<?php echo url::site('servicio/editar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/table_edit.png', array('class'=>'icono'))?>Editar</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('servicio/borrar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono'))?>Borrar</a></td>
	</tr>
	<?php } ?>
</table>
