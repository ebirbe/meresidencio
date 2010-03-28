<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Agregar im&aacute;genes a la publicaci&oacute;n <?php echo $publicacion_id ?></h2>
<?php echo form::open_multipart() ?>
<?php echo form::hidden('publicacion',$publicacion_id) ?>
<table class="tabla_ext">
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php if($numero_imagenes >= 6) {?>
	<tr>
		<th colspan="3">Has alcanzado el m&aacute;ximo de im&aacute;genes.</th>
	</tr>
	<?php }else{ ?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen','accept'=>'image/png,image/jpeg,image/gif')) ?><br>
		</td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Guardar') ?></td>
	</tr>
	<?php }?>
</table>
	<?php echo form::close() ?>
<div class="clear"></div>
<br>
<h2>Im&aacute;genes</h2>
<br>
	<?php
	$imagen_lista = new View('imagen/lista');
	$imagen_lista->imagenes = $publicacion->imagenes;
	$imagen_lista->admin = FALSE;
	echo $imagen_lista;
	?>
<div class="clear"></div>
<br>
<br>
<div align="center"><?php echo form::open(url::site("publicacion/detalles/".$publicacion_id), array("method"=>"get")) . form::submit(array('class'=>'button'), 'Finalizar') . form::close() ?></div>
