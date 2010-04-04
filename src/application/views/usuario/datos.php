<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo html_Core::script('media/js/scw.js', FALSE); ?>
<?php echo $script_combo; ?>
<?php echo form_Core::open(/*NULL, array('method'=>'get')*/);?>
<h2>Editar Datos de Usuario</h2>
<br/>
<table class="tabla_ext">
	<?php if($mensaje) {?>
	<tr>
		<th colspan="3"><?php echo $mensaje ?></th>
	</tr>
	<?php }?>
	<?php if($quien_entra->tipo == USUARIO_ADMIN) {
		// Dibuja los textos de el campo Estatus 
		if($usuario->activo){
			$txt_activo = html::image('media/img/iconos/accept.png', array('class'=>'icono', 'alt'=>'Activo'));
			$txt_activo_accion = html::anchor(url::site('usuario/volver_activo/'.$usuario->id),"Inhabilitar");
		}else{
			$txt_activo = html::image('media/img/iconos/cancel.png', array('class'=>'icono', 'alt'=>'Inactivo'));
			$txt_activo_accion = html::anchor(url::site('usuario/volver_activo/'.$usuario->id),"Habilitar");
		}
		
		// Dibuja los textos de el campo Confirmacion de Correo
		if($usuario->confirmado){
			$txt_conf = html::image('media/img/iconos/accept.png', array('class'=>'icono', 'alt'=>'Confirmado'));
			$txt_conf_accion = html::anchor(url::site('usuario/volver_confirmado/'.$usuario->id),"Poner pendiente");
		}else{
			$txt_conf = html::image('media/img/iconos/cancel.png', array('class'=>'icono', 'alt'=>'Pendiente'));
			$txt_conf_accion = html::anchor(url::site('usuario/volver_confirmado/'.$usuario->id),"Confirmar");
		}
		?>
	<tr>
		<td><?php echo form::label('activo', 'Estatus:')?></td>
		<td id="activo"><?php echo $txt_activo ?></td>
		<td><?php echo $txt_activo_accion ?></td>
	</tr>
	<tr>
		<td><?php echo form::label('confirmado', 'Confirmado:')?></td>
		<td id="confirmado"><?php echo $txt_conf ?></td>
		<td><?php echo $txt_conf_accion ?></td>
	</tr>
	<?php }?>
	<tr>
		<td class="columna_titulos"><?php echo form::label('login', 'Usuario:')?></td>
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
		<td><?php echo form::label('fecha_nac', 'F. de Nacimiento:')?></td>
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
		<td colspan="3"><?php echo form::submit(array('class'=>'button'), 'Guardar')?></td>
	</tr>
</table>
		<?php echo form::close();?>
