<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Detalles</h2>
<div class="comodidades">
	<table class="tabla_ext">
		<tr>
			<td class="columna_titulos">Estado:</td>
			<td><strong><?php echo $publicacion->zona->ciudad->estado->nombre; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Ciudad:</td>
			<td><strong><?php echo $publicacion->zona->ciudad->nombre; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Zona:</td>
			<td><strong><?php echo $publicacion->zona->nombre; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Tipo:</td>
			<td><strong><?php echo $publicacion->tipoinmueble->nombre; ?></strong></td>
		</tr>
	</table>
</div>
<div class="cercanias">
	<table class="tabla_ext">
		<tr class="fila_detalle">
			<td class="columna_titulos">Sexo:</td>
			<td><strong><?php echo $publicacion->sexo; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Metros<sup>2</sup>:</td>
			<td><strong><?php echo $publicacion->mts; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Habitaciones:</td>
			<td><strong><?php echo $publicacion->habitaciones; ?></strong></td>
		</tr>
		<tr>
			<td class="columna_titulos">Dep&oacute;sito:</td>
			<td><strong><?php echo $publicacion->deposito; ?> mes(es).</strong></td>
		</tr>
	</table>
</div>
<div class="clear"></div>
<div class="precio"><?php echo $publicacion->precio; ?> Bs.</div>
<div class="clear"></div>
<div class="comodidades">
	<h2>Comodidades</h2>
	<ul>
	<?php
	if ($publicacion->servicios->count() > 0){
		foreach ($publicacion->servicios as $servicio){
			echo "<li>$servicio->nombre</li>";
		}
	}else{
		echo "<li>El propietario no especific&oacute; nada.</li>";
	}
	?>
	</ul>
</div>
<div class="cercanias">
	<h2>Cercan&iacute;as</h2>
	<ul>
	<?php
	if ($publicacion->servicios->count() > 0){
		foreach ($publicacion->cercanias as $cercania){
			echo "<li>$cercania->nombre</li>";
		}
	}else{
		echo "<li>El propietario no especific&oacute; nada.</li>";
	}
	?>
	</ul>
</div>
<div class="clear"></div>
<h2>Descripci&oacute;n</h2>
<p>
<?php
if ($publicacion->descripcion != NULL)		echo $publicacion->descripcion; 
else 										echo "El propietario no especific&oacute; nada.";
?>
</p>
<div class="clear"></div>
