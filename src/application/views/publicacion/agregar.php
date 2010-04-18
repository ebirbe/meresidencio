<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<?php echo html_Core::script('media/js/scw.js', FALSE); ?>
<?php echo new View('js/combo_regiones'); ?>
<h2>Menu de Publicaci&oacute;n</h2>
<?php echo form::open() ?>
<?php echo form::hidden('usuario',$usuario->id) ?>
<table class="tabla_ext">
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><b>Este es tu numero <br/>de telefono personal:</b></td>
		<td><?php echo $usuario->telefono ?></td>
		<td><?php echo $errores['telefono'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('telefono', 'Agregue uno o mas<br/> teléfonos adicionales:')?></td>
		<td><?php echo form::input('telefono', $formulario['telefono'], "size='30'")?></td>
		<td><?php echo $errores['telefono'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('tipoinmueble','Tipo de Inmueble:') ?></td>
		<td><?php echo Tipoinmueble_Model::combobox($formulario['tipoinmueble']); ?></td>
		<td><?php echo $errores['tipoinmueble'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('sexo','Sexo:') ?></td>
		<td><?php echo Publicacion_Model::combobox_sexo($formulario['sexo']) ?></td>
		<td><?php echo $errores['sexo'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('estado','Estado:') ?></td>
		<td><?php echo Estado_Model::combobox($formulario['estado']); ?></td>
		<td><?php echo $errores['estado'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('ciudad','Ciudad:') ?></td>
		<td><?php echo Ciudad_Model::combobox($formulario['estado'], $formulario['ciudad']); ?></td>
		<td><?php echo $errores['ciudad'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('zona','Zona:') ?></td>
		<td><?php echo Zona_Model::combobox($formulario['ciudad'], $formulario['zona']); ?></td>
		<td><?php echo $errores['zona'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('direccion','Direccion:') ?></td>
		<td><?php echo form::input('direccion', $formulario['direccion'], "size='30'") ?></td>
		<td><?php echo $errores['direccion'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('hab','Habitaciones:') ?></td>
		<td><?php echo form::input('habitaciones', $formulario['habitaciones'], "size='2'") ?></td>
		<td><?php echo $errores['habitaciones'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('mts','Metros<sup>2</sup>:') ?></td>
		<td><?php echo form::input('mts', $formulario['mts'], "size='2'") ?></td>
		<td><?php echo $errores['mts'] ?></td>
	</tr>
</table>
<table class="tabla_ext">
	<tr>
		<th colspan="1">COMODIDADES:</th>
		<th colspan="2">CERCANIAS:</th>
	</tr>
	<tr>
		<td><?php 
		foreach (ORM::factory('servicio')->find_all() as $servicio){
			echo form::checkbox('servicio[]', $servicio->id, in_array($servicio->id, $formulario['servicio']));
			echo form::label($servicio->nombre, $servicio->nombre);
			echo "<br>";
		}
		?></td>

		<td colspan="2"><?php 
		foreach (ORM::factory('cercania')->find_all() as $cercania){
			echo form::checkbox('cercania[]', $cercania->id, in_array($cercania->id, $formulario['cercania']));
			echo form::label($cercania->nombre, $cercania->nombre);
			echo "<br>";
		}
		?></td>
	</tr>
</table>
<table class="tabla_ext">
	<tr>
		<td><?php echo form::label('precio','Precio:') ?></td>
		<td><?php echo form::input('precio', $formulario['precio'], "size='8'") ?></td>
		<td><?php echo $errores['precio'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('deposito','Meses de Deposito:') ?></td>
		<td><?php echo form::input('deposito', $formulario['deposito'], "size='2'") ?></td>
		<td><?php echo $errores['deposito'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('descripcion','Descripcion:') ?></td>
		<td><?php echo form::textarea(array('name'=>'descripcion', 'cols'=>'50', 'rows'=>'5'), $formulario['descripcion']) ?></td>
		<td><?php echo $errores['descripcion'] ?></td>
	</tr>
	<?php if($editar){?>
	<tr>
		<td><?php echo form::label('activo','Publicaci&oacute;n activa:') ?></td>
		<td><?php echo form::checkbox('activo', 1, $formulario['activo']); ?></td>
		<td><?php echo $errores['activo'] ?></td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Guardar') ?></td>
	</tr>
</table>
		<?php echo form::close() ?>
