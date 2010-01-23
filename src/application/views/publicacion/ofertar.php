<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th colspan="6">Detalles para la publicaci&oacute;n nro. <?php echo $publicacion->id ?>:</th>
	</tr>
</table>
<table>
	<tr>
		<td>Tipo:</td>
		<td><?php echo $publicacion->tipoinmueble->nombre; ?></td>
	</tr>
	<tr>
		<td>Sexo:</td>
		<td><?php echo $publicacion->sexo; ?></td>
	</tr>
	<tr>
		<td>Estado:</td>
		<td><?php echo $publicacion->zona->ciudad->estado->nombre; ?></td>
	</tr>
	<tr>
		<td>Ciudad:</td>
		<td><?php echo $publicacion->zona->ciudad->nombre; ?></td>
	</tr>
	<tr>
		<td>Zona:</td>
		<td><?php echo $publicacion->zona->nombre; ?></td>
	</tr>
	<tr>
		<td>Metros<sup>2</sup>:</td>
		<td><?php echo $publicacion->mts; ?></td>
	</tr>
	<tr>
		<td>Habitaciones:</td>
		<td><?php echo $publicacion->habitaciones; ?></td>
	</tr>
	<tr>
		<td>Direccion:</td>
		<td><?php echo $publicacion->direccion; ?></td>
	</tr>
	<tr>
		<td>Servicios:</td>
		<td><?php 
		foreach ($publicacion->servicios as $servicio){
			echo $servicio->nombre;
			echo "<br>";
		}
		?></td>
	</tr>
	<tr>
		<td>Cercan&iacute;as:</td>
		<td><?php 
		foreach ($publicacion->cercanias as $cercania){
			echo $cercania->nombre;
			echo "<br>";
		}
		?></td>
	</tr>
	<tr>
		<td>Precio:</td>
		<td><?php echo $publicacion->precio; ?></td>
	</tr>
	<tr>
		<td>Meses de Dep&oacute;sito:</td>
		<td><?php echo $publicacion->deposito; ?></td>
	</tr>
	<tr>
		<td>Descripci&oacute;n:</td>
		<td><?php echo $publicacion->descripcion; ?></td>
	</tr>
</table>
<table>
	<tr>
		<th>Datos del Propietario:</th>
	</tr>
	<tr>
		<td>Nombre:</td>
		<td><?php echo $publicacion->usuario->nombre; ?></td>
	</tr>
	<tr>
		<td>Apellido:</td>
		<td><?php echo $publicacion->usuario->apellido; ?></td>
	</tr>
	<tr>
		<td>Correo Electr&oacute;nico:</td>
		<td><?php echo $publicacion->usuario->correo; ?></td>
	</tr>
	<tr>
		<td>Tel&eacute;fono:</td>
		<td><?php echo $publicacion->usuario->telefono; ?></td>
	</tr>
</table>
<table>
	<tr>
		<td><?php echo html::anchor('calificacion/calificar/'.$calificacion_id, 'Calificar la Operaci&oacute;n')?></td>
	</tr>
</table>
<br>
		<?php echo html::anchor('publicacion', '<- Volver') ?>
