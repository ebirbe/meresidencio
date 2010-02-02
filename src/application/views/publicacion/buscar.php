<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<h2>Buscar Publicaci&oacute;n</h2>
<?php echo form::open($url.$token)?>
<input type='hidden' class='hidden' value='<?php echo $token ?>'>
<table class='tabla_ext'>
	<tr>
		<td><?php echo form_Core::label('estado', 'Estado') ?></td>
		<td><?php echo form_Core::label('ciudad', 'Ciudad') ?></td>
		<td><?php echo form_Core::label('zona', 'Zona') ?></td>
	</tr>
	<tr>
		<td><?php echo Estado_Model::combobox(); ?></td>
		<td><?php echo Ciudad_Model::combobox(); ?></td>
		<td><?php echo Zona_Model::combobox(); ?></td>
	</tr>
	<tr>
		<td><?php echo form_Core::label('tipoinmueble', 'Tipo Inmueble') ?></td>
		<td><?php echo form_Core::label('sexo', 'Sexo') ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo Tipoinmueble_Model::combobox(); ?></td>
		<td><?php echo Publicacion_Model::combobox_sexo(); ?></td>
		<td><?php echo form::submit(array('class' => 'button'), 'Buscar') ?></td>
	</tr>
</table>
<?php echo form::close()?>
<div class="clear"></div>
<h2>Resultados de la Busqueda</h2>
<?php echo $paginacion ?>
<div class="clear"></div>
	<?php foreach ($publicacion as $fila) { 
		$pub_item = new View('publicacion/item');
		$pub_item->publ = $fila;
		echo $pub_item;
		?>
		<!-- 
			<?php if($fila->imagenes[0] == NULL){?>
				<tr>
					<td rowspan="5"><img width="150" height="150" src='<?php echo url::base(FALSE).'media/img/no_img.gif' ?>' /></td>
				</tr>
			<?php }else{ ?>
				<tr>
					<td rowspan="5"><img width="150" height="150" src='<?php echo url::site('imagen/mostrar').'/'.$fila->imagenes[0] ?>' alt='<?php echo url::site('publicacion/imagenes').'/'.$fila->imagenes[0] ?>' /></td>
				</tr>
				<?php } ?>
	<tr>
		<td><?php echo $fila->tipoinmueble->nombre; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->zona->ciudad->nombre; ?> - <?php echo $fila->zona->ciudad->estado->nombre; ?> - <?php echo $fila->zona->nombre; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->sexo; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->descripcion; ?> <a href='<?php echo url::site('publicacion/detalles').'/'.$fila->id ?>'>m&aacute;s &gt;</a></td>
	</tr>
	 -->
	<?php } ?>
<div class="clear"></div>
<?php echo $paginacion ?>
