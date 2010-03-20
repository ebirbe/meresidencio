<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<div align="left"><h5>Propietario: <?php echo $publicacion->usuario->login; ?></h5></div>
<div align="right"><h4>Publicaci&oacute;n #<?php echo $publicacion->id ?></h4></div>
<h2>Im&aacute;genes</h2>
<br>
<?php
$imagen_lista = new View('imagen/lista');
$imagen_lista->imagenes = $publicacion->imagenes;
echo $imagen_lista;
?>

<?php echo $vista_caracteristicas; ?>
<!-- 
<table>
	<tr>
		<th><h3>Opciones</h3></th>
	</tr>
	<?php if(isset($usuario_sesion) && $usuario_sesion->es_propio($publicacion->usuario_id)){ ?>
	<tr>
		<td><a
			href='<?php echo url::site('publicacion/editar/'.$publicacion->id)?>'><?php echo html_Core::image('media/img/iconos/table_edit.png', array('class'=>'icono'))?>Editar
		Publicacion</a></td>
	</tr>
	<tr>
		<td><a
			href='<?php echo url::site('imagen/agregar/'.$publicacion->id)?>'><?php echo html_Core::image('media/img/iconos/picture_edit.png', array('class'=>'icono'))?>Editar
		Imagenes</a></td>
	</tr>
	<?php }else{?>
	<tr>
		<td><a
			href='<?php echo url::site('publicacion/ofertar/'.$publicacion->id)?>'><?php echo html_Core::image('media/img/iconos/cart_go.png', array('class'=>'icono'))?>Solicitar</a></td>
	</tr>
	<?php } ?>
</table>
 -->