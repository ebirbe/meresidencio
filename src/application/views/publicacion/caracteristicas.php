<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table class="tabla_ext">
    <tr>
	<td style="width:50%;">
	    <h2>Detalles</h2>
	</td>
	<td style="width:50%;">
	    <h2>Im&aacute;genes</h2>
	</td>
    </tr>
    <tr>
	<td>
	    <table class="tabla_ext">
		<tr>
			<td class="columna_titulos">Tipo:</td>
			<td><strong><?php echo $publicacion->tipoinmueble->nombre; ?></strong></td>
		</tr>
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
		<tr>
		    <td class="columna_titulos">Tel&eacute;fono:<br/></td>
			<td><strong>
				<?php if($publicacion->activo){?>
				    <?php echo $publicacion->usuario->telefono; ?>
				<?php }else{ ?>
				    PUBLICACION INACTIVA
				<?php } ?>
			    </strong></td>
		</tr>
		<tr>
		    <td class="columna_titulos">Correo:</td>
			<td><strong>
				<?php if($publicacion->activo){?>
				    <?php echo html::anchor(url::site('publicacion/ofertar/'.$publicacion->id),"Solicitar Correo")?>
				<?php }else{ ?>
				    PUBLICACION INACTIVA
				<?php } ?>
			    </strong></td>
		</tr>
	    </table>
	</td>
	<td>
	    <?php
	    $imagen_lista = new View('imagen/lista');
	    $imagen_lista->imagenes = $publicacion->imagenes;
	    echo $imagen_lista;
	    ?>
	</td>
    </tr>
    <tr>
	<td class="precio" colspan="2">
	    <?php echo $publicacion->precio; ?><br/>Bs./Mes
	</td>
    <tr>
    <tr>
	<td>
	    <h2>Comodidades</h2>
	</td>
	<td>
	    <h2>Cercan&iacute;as</h2>
	</td>
    </tr>
    <tr>
	<td>
	    <table class="tabla_ext">
		<?php
		if ($publicacion->servicios->count() > 0){
			foreach ($publicacion->servicios as $servicio){
				echo "<tr><td>$servicio->nombre</td></tr>";
			}
		}else{
			echo "<tr><td>El propietario no especific&oacute; nada.</tr></td>";
		}
		?>
	    </table>
	</td>
	<td>
	    <table class="tabla_ext">
		<?php
		if ($publicacion->servicios->count() > 0){
			foreach ($publicacion->cercanias as $cercania){
				echo "<tr><td>$cercania->nombre</tr></td>";
			}
		}else{
			echo "<tr><td>El propietario no especific&oacute; nada.</tr></td>";
		}
		?>
	    </table>
	</td>
    </tr>
</table>
<h2>Descripci&oacute;n</h2>
<p class="descripcion">
    <?php
    if ($publicacion->descripcion != NULL)
	echo $publicacion->descripcion;
    else
	echo "El propietario no especific&oacute; nada.";
    ?>
</p>
<div class="clear"></div>
