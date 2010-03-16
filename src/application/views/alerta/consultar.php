<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Consultar Alerta</h2>
<table class="tabla_alertas">
	<tr>
		<td rowspan=3><?php echo $alerta->estado->nombre ?></td>
		<td rowspan=3> &gt;&gt; <?php echo $alerta->ciudad->nombre ?></td>
		<td rowspan=3> &gt;&gt; <?php echo $alerta->zona->nombre ?></td>
		<td rowspan=3> &gt;&gt; <?php echo $alerta->tipoinmueble->nombre ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><?php echo html::anchor('alerta/mis_alertas', html_Core::image('media/img/iconos/arrow_undo.png', array('class'=>'icono')).'Volver') ?></td>
	</tr>
	<tr>
		<td><?php echo html::anchor('alerta/eliminar/'.$alerta->id, html_Core::image('media/img/iconos/user.png', array('class'=>'icono')).'Eliminar') ?></td>
	</tr>
</table>
<?php echo $paginacion ?>
<div class="clear"></div>
	<?php 
	foreach ($publicaciones as $fila) { 
		$pub_item = new View('publicacion/item');
		$pub_item->uso = NULL;
		$pub_item->publ = $fila;
		echo $pub_item;
	} 
	?>
<div class="clear"></div>
<?php echo $paginacion ?>