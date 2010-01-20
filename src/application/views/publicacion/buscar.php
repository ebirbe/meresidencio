<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<?php echo form::open($url.$token)?>
<?php echo form::hidden('token', $token)?>
<table>
	<tr>
		<th colspan="2">Buscar Publicacion</th>
	</tr>
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
		<td><?php echo form::submit('submit', 'Buscar') ?></td>
	</tr>
</table>
<?php echo form::close()?>
<table>
	<tr>
		<th colspan="5">Resultados de la Busqueda</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
	<?php foreach ($publicacion as $fila) { ?>
			<?php if($fila->imagenes[0] == NULL){?>
				<tr>
					<td rowspan="5"><img width="72" height="72" src='<?php echo url::base(FALSE).'media/img/no_img.gif' ?>' /></td>
				</tr>
			<?php }else{ ?>
				<tr>
					<td rowspan="5"><img width="72" height="72" src='<?php echo url::site('imagen/mostrar').'/'.$fila->imagenes[0] ?>' alt='<?php echo url::site('publicacion/imagenes').'/'.$fila->imagenes[0] ?>' /></td>
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
	<?php } ?>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
</table>

<br>
		<?php echo html::anchor('publicacion', '<- Volver') ?>