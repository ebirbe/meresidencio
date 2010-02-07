<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<h2><strong>Mis Alertas</strong></h2>
<p class="intro-text">Estas son las alertas que tienes activas en este momento, cada vez que
registremos una publicaci&oacute;n que coincida con los filtros seleccionados
por ti en alguna de estas alertas, un mensaje ser&aacute; enviado a tu cuenta
de correo electr&oacute;nico informandote sobre la existencia de la nueva 
publicaci&oacute;n.</p>
<div class="clear"></div>
<?php echo form::open(url::site('alerta/agregar'))?>
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
		<td><?php echo form::submit(array("class"=>"button"), 'Suscribir') ?></td>
	</tr>
</table>
<?php echo form::close()?>
<div class="clear"></div>
<table class="tabla_alertas" border=0>
	
	<?php
	foreach($alertas as $fila){
		$item = new View('alerta/item');
		$item->fila = $fila;
		echo $item;
	}
	?>
</table>


