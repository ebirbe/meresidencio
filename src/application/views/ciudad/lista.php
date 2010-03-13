<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
?>
<h2>Lista de Ciudades</h2>
<table class="tabla_alertas">
<?php foreach ($ciudad as $fila) { ?>
	<tr>
		<td rowspan="4"><?php echo html_Core::specialchars($fila->nombre) ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><a href='<?php echo url::site('ciudad/editar/'.$estado_id.'/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/table_edit.png', array('class'=>'icono'))?>Editar</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('ciudad/borrar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono'))?>Borrar</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('zona/agregar/'.$fila->id)?>'><?php echo html_Core::image('media/img/iconos/arrow_right.png', array('class'=>'icono'))?>Zonas</a></td>
	</tr>
	<?php } ?>
</table>
