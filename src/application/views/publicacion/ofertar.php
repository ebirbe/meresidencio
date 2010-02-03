<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<div align="left"><h2>Solicitud de Alquiler #<?php echo $calificacion_id ?></h2></div>
<p>Todos los datos de esta 
<?php echo html::anchor("publicacion/detalles/".$publicacion->id, "publicaci&oacute;n")?> han sido enviados 
a tu cuenta de correo electr&oacute;nico. Despues de comunicarte
con tu contraparte o finalizar la operaci&oacute;n de 
alquiler recuerda <?php echo html::anchor("calificacion/calificar/$calificacion_id", "calificarla")?>.</p>
<h2>Datos del Propietario</h2>
<table class="tabla_ext">
	<tr>
		<td>Nombre:</td>
		<td><strong><?php echo $publicacion->usuario->nombre; ?></strong></td>
	</tr>
	<tr>
		<td>Apellido:</td>
		<td><strong><?php echo $publicacion->usuario->apellido; ?></strong></td>
	</tr>
	<tr>
		<td>Correo Electr&oacute;nico:</td>
		<td><strong><?php echo $publicacion->usuario->correo; ?></strong></td>
	</tr>
	<tr>
		<td>Tel&eacute;fono:</td>
		<td><strong><?php echo $publicacion->usuario->telefono; ?></strong></td>
	</tr>
	<tr>
		<td>Direcci&oacute;n:</td>
		<td><strong><?php echo $publicacion->direccion; ?></strong></td>
	</tr>
</table>
<br/>
<div class="clear"></div>
<?php echo $vista_caracteristicas ?>
