<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<?php echo form::open($url.$token)?>
<div><input type='hidden' class='hidden' value='<?php echo $token ?>'/></div>
<table class='tabla_ext'>
	<tr>
		<td><?php echo form_Core::label('estado', 'Estado') ?></td>
		<td><?php echo form_Core::label('ciudad', 'Ciudad') ?></td>
		<td><?php echo form_Core::label('zona', 'Zona') ?></td>
		
		<td><?php echo form_Core::label('tipoinmueble', 'Tipo Inmueble') ?></td>
		<td><?php echo form_Core::label('sexo', 'Sexo') ?></td>
	</tr>
	<tr>
		<td><?php echo Estado_Model::combobox(); ?></td>
		<td><?php echo Ciudad_Model::combobox(); ?></td>
		<td><?php echo Zona_Model::combobox(); ?></td>
		
		<td><?php echo Tipoinmueble_Model::combobox(); ?></td>
		<td><?php echo Publicacion_Model::combobox_sexo(); ?></td>
	</tr>
	<tr>
		<td colspan="5" align="center"><?php echo form::submit(array('class' => 'button'), 'Buscar') ?></td>
	</tr>
</table>
<?php echo form::close()?>
<h2>Residencias en Alquiler</h2>
<div class="clear"></div>
<?php echo $paginacion ?>
<div class="clear"></div>
	<?php 
	if($publicacion->count()==0){
		echo "<p align='center'><b>No hay resultados</b></p>";
	}else{
		foreach ($publicacion as $fila) { 
			$pub_item = new View('publicacion/item');
			$pub_item->uso = NULL;
			$pub_item->publ = $fila;
			echo $pub_item;
		}
	}
	?>
<div class="clear"></div>
<?php echo $paginacion ?>
