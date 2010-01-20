<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th colspan="2">Cod. de Publicaci&oacute;n <?php echo $publicacion->id ?></th>
	</tr>
	<tr>
		<td><?php
		$i = 1;
		foreach($publicacion->imagenes as $imagen){
			?> <a
			href='<?php echo url::site('imagen/album').'/'.$publicacion->id.'/pagina/'.$i++ ?>'><img
			width="72" height="72"
			src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a> <?php } ?>
		</td>
	</tr>
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
		<?php if(isset($usuario_sesion) && $usuario_sesion->id == $publicacion->usuario_id){ ?>
<table>
	<tr>
		<th>Operaciones</th>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('publicacion/editar/'.$publicacion->id)?>'>Editar Publicacion</a></td>
	</tr>
	<tr>
		<td><a href='<?php echo url::site('imagen/agregar/'.$publicacion->id)?>'>Editar Imagenes</a></td>
	</tr>
	<tr>
		<td><a href=''>Eliminar</a></td>
	</tr>
</table>
		<?php } ?>


<br>
		<?php echo html::anchor('publicacion', '<- Volver') ?>
