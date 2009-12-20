<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo html_Core::script('media/js/scw.js', FALSE); ?>
<?php echo $script_combo; ?>
<?php echo form_Core::open(/*NULL, array('method'=>'get')*/);?>
<table>
	<tr>
		<th colspan="3">Datos Personales del Usuario</th>
	</tr>
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<tr>
		<td><?php echo form::label('estatus', 'Estatus:')?></td>
		<td><?php echo form_Core::radio('activo',1, $formulario['activo']==1) ?>Habilitado<br><?php echo form_Core::radio('activo',0, $formulario['activo']==0) ?>Inhabilitado</td>
		<td><?php echo $errores['activo'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('login', 'Usuario:')?></td>
		<td><?php echo form::input(array('name'=>'usuario', 'readonly'=>'readonly'), $formulario['login'])?></td>
		<td><?php echo $errores['login'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('correo', 'Correo Electronico:')?></td>
		<td><?php echo form::input(array('name'=>'correo', 'readonly'=>'readonly'), $formulario['correo'])?></td>
		<td><?php echo $errores['correo'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('nombre:', 'Nombre:')?></td>
		<td><?php echo form_Core::input('nombre', $formulario['nombre'])?></td>
		<td><?php echo $errores['nombre'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('apellido', 'Apellido:')?></td>
		<td><?php echo form::input('apellido', $formulario['apellido'])?></td>
		<td><?php echo $errores['apellido'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('fecha_nac', 'Fecha de Nacimiento:')?></td>
		<td><?php echo form::input(array('name'=>'fecha_nac', 'readonly'=>'readonly'), $formulario['fecha_nac'], 'onClick="scwShow(scwID(\'fecha_nac\'),event);"')?></td>
		<td><?php echo $errores['fecha_nac'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('telefono', 'Tel&eacute;fono:')?></td>
		<td><?php echo form::input('telefono', $formulario['telefono'])?></td>
		<td><?php echo $errores['telefono'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('estado', 'Estado:')?></td>
		<td><?php echo $estado ?></td>
		<td><?php echo $errores['estado'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('ciudad', 'Ciudad:')?></td>
		<td><select id="ciudad" name="ciudad">
		<?php
		foreach ($ciudad as $key => $value){
			echo $value;
		}
		?>
		</select></td>
		<td><?php echo $errores['ciudad'] ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('zona', 'Zona:')?></td>
		<td><select id="zona" name="zona">
		<?php
		foreach ($zona as $key => $value){
			echo $value;
		}
		?>
		</select></td>
		<td><?php echo $errores['zona'] ?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form::submit('sibmit', 'Guardar')?></td>
	</tr>
</table>
		<?php echo form::close();?>
