<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
$fecha = split("-",$publicacion->fecha);
?>

<br/>
<div class="center">
	<?php echo html::anchor(url::site('publicacion/ofertar/'.$publicacion->id),html_Core::image('media/img/btn_solicitar.png', array('class'=>'icono', 'alt'=>'Solicitar Datos del Propietario')))?>
</div>
<br/>

<table id="cabecera_detalles">
	<tr>
		<td align="left"><b>Publicaci&oacute;n</b> #<?php echo $publicacion->id ?></td>
		<td align="right"><b>Publicada por</b> <?php echo $publicacion->usuario->login; ?></td>
	</tr>
	<tr>
		<td align="left"><b>Visto</b> <?php echo $publicacion->visitas; ?> veces.</td>
		<td align="right"><b>Solicitado por</b> <?php echo $publicacion->calificaciones->count() ?> usuarios.</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><b>Publicado el</b><br/><?php echo $fecha[2]."-".$fecha[1]."-".$fecha[0]; ?></td>
	</tr>
</table>

<?php echo $vista_caracteristicas; ?>

<br/>
<div class="center">
	<?php echo html::anchor(url::site('publicacion/ofertar/'.$publicacion->id),html_Core::image('media/img/btn_solicitar.png', array('class'=>'icono', 'alt'=>'Solicitar Datos del Propietario')))?>
</div>
<br/>

<h2>Im&aacute;genes</h2>
<br/>
<?php
$imagen_lista = new View('imagen/lista');
$imagen_lista->imagenes = $publicacion->imagenes;
echo $imagen_lista;
?>