<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<?php echo form::open_multipart() ?>
<?php echo form::hidden('publicacion',$publicacion_id) ?>
<table>
	<tr>
		<th colspan="3">Agregar im&aacute;genes a la publicaci&oacute;n <?php echo $publicacion_id ?></th>
	</tr>
	<?php if($tope) {?>
	<tr>
		<th colspan="3">Has alcanzado el m&aacute;ximo de im&aacute;genes.</th>
	</tr>
	<?php }else{?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen1','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen1']) ?><br>
		</td>
		<td><?php echo $errores['imagen1']; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen2','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen2']) ?><br>
		</td>
		<td><?php echo $errores['imagen2']; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo form::upload(array('name'=>'imagen3','accept'=>'image/png,image/jpeg,image/gif'), $formulario['imagen3']) ?><br>
		</td>
		<td><?php echo $errores['imagen3']; ?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit(NULL, 'Guardar') ?></td>
	</tr>
	<?php }?>
</table>
<table>
	<tr>
		<td><?php
		$i = 1;
		foreach($publicacion->imagenes as $imagen){
			?> <a
			href='<?php echo url::site('imagen/album').'/'.$publicacion->id.'/pagina/'.$i++ ?>'
			target='_blank'><img width="72" height="72"
			src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a> <?php } ?>
		</td>
	</tr>
</table>
			<?php echo form::close() ?>
<br>
			<?php echo html::anchor('imagen', '<- Volver') ?>