<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<?php echo form::open()?>
<table>
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form_Core::label('estado', 'Estado') ?></td>
		<td><?php echo form_Core::label('ciudad', 'Ciudad') ?></td>
		<td><?php echo form_Core::label('zona', 'Zona') ?></td>
		<td><?php echo form_Core::label('tipoinmueble', 'Tipo Inmueble') ?></td>
	</tr>
	<tr>
		<td><?php echo Estado_Model::combobox(); ?></td>
		<td><?php echo Ciudad_Model::combobox(); ?></td>
		<td><?php echo Zona_Model::combobox(); ?></td>
		<td><?php echo Tipoinmueble_Model::combobox(); ?></td>
	</tr>
	<tr>
		
		<td colspan="4"><?php echo form::submit('submit', 'Suscribir') ?></td>
	</tr>
</table>
<?php echo form::close()?>