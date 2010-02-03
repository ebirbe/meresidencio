<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<div align="left"><h5>Propietario: <?php echo $publicacion->usuario->login; ?></h5></div>
<div align="right"><h4>Publicaci&oacute;n #<?php echo $publicacion->id ?></h4></div>
<?php if ($publicacion->imagenes->count() > 0){ ?>
	<h2>Im&aacute;genes</h2>
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
<div class="clear"></div>

<?php echo $vista_caracteristicas; ?>

<table>
	<tr>
		<th><h3>Opciones</h3></th>
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
