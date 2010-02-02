<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<div align="right"><h4>Publicaci&oacute;n #<?php echo $publicacion->id ?></h4>
<h5>Propietario: <?php echo $publicacion->usuario->login; ?></h5>
</div>
<?php if ($publicacion->imagenes->count() > 0){ ?>
	<h2>Im&aacute;genes:</h2>
	<table class="tabla_ext">
		<tr>
		<?php
		$i = 1;
		foreach($publicacion->imagenes as $imagen){
			if($i++ == 4) echo "</tr><tr>";
			?>
			<td><a class="lightbox"
				href='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>'><img
				class="img-center"
				src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a>
			</td>
		<?php } ?>
		</tr>
	</table>
<?php }?>
<h2>Detalles:</h2>
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
			<td><strong><?php echo $publicacion->habitaciones; ?></td>
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
	<h2>Comodidades:</h2>
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
	<h2>Cercan&iacute;as:</h2>
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
<h2>Descripci&oacute;n</h2>
<p>
<?php
if ($publicacion->descripcion != NULL)		echo $publicacion->descripcion; 
else 										echo "El propietario no especific&oacute; nada.";
?>
</p>
<div class="clear"></div>

<table>
	<tr>
		<th>Operaciones</th>
	</tr>
	<?php if(isset($usuario_sesion) && $usuario_sesion->es_propio($publicacion->usuario_id)){ ?>
	<tr>
		<td><a
			href='<?php echo url::site('publicacion/editar/'.$publicacion->id)?>'>Editar
		Publicacion</a></td>
	</tr>
	<tr>
		<td><a
			href='<?php echo url::site('imagen/agregar/'.$publicacion->id)?>'>Editar
		Imagenes</a></td>
	</tr>
	<?php }else{?>
	<tr>
		<td><a
			href='<?php echo url::site('publicacion/ofertar/'.$publicacion->id)?>'>Ofertar</a></td>
	</tr>
	<?php } ?>
</table>
