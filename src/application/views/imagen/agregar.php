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
	<?php if($numero_imagenes+1 <= MAXIMO_IMAGENES){ ?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen1','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen1']) ?><br>
		</td>
		<td><?php echo $errores['imagen1']; ?></td>
	</tr>
	<?php } if($numero_imagenes+2 <= MAXIMO_IMAGENES){?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen2','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen2']) ?><br>
		</td>
		<td><?php echo $errores['imagen2']; ?></td>
	</tr>
	<?php } if($numero_imagenes+3 <= MAXIMO_IMAGENES){?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen3','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen3']) ?><br>
		</td>
		<td><?php echo $errores['imagen3']; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Guardar') ?></td>
	</tr>
	<?php }?>
</table>
<div class="clear"></div>
<br>
<h2>Im&aacute;genes</h2>
<br>
<table>
	<tr>
	<?php
	$i = 1;
	foreach($publicacion->imagenes as $imagen){
		?>
		<td><a
			href='<?php echo url::site('imagen/album').'/'.$publicacion->id.'/pagina/'.$i++ ?>'
			target='_blank'><img width="72" height="72"
			src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a></td>
			<?php } ?>

	</tr>
	<tr>
	<?php
	foreach($publicacion->imagenes as $imagen){
		?>
		<td align="center"><a
			href='<?php echo url::site('imagen/eliminar').'/'.$imagen->id ?>'><?php echo html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono', 'alt'=>'Eliminar'))?></a>
		</td>
		<?php } ?>
	</tr>
</table>
		<?php echo form::close() ?>
		<div class="clear"></div>
		<br><br>
		<div align="center"><?php echo form::open(url::site("publicacion/detalles/".$publicacion_id), array("method"=>"get")) . form::submit(array('class'=>'button'), 'Finalizar') . form::close() ?></div>