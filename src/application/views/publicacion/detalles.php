<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
$fecha = explode("-",$publicacion->fecha);
?>

<br/>
<div class="center">
    <?php if($publicacion->activo){?>
	<?php echo html::anchor(url::site('publicacion/ofertar/'.$publicacion->id),html_Core::image('media/img/btn_solicitar.png', array('class'=>'icono', 'alt'=>'Solicitar Datos del Propietario')))?>
    <?php }else{ ?>
    <h3>PUBLICACION INACTIVA</h3>
    <?php } ?>
</div>
<br/>

<?php echo $vista_caracteristicas; ?>

<br/>
<div class="center">
    <?php if($publicacion->activo){?>
	<?php echo html::anchor(url::site('publicacion/ofertar/'.$publicacion->id),html_Core::image('media/img/btn_solicitar.png', array('class'=>'icono', 'alt'=>'Solicitar Datos del Propietario')))?>
    <?php }else{ ?>
    <h3>PUBLICACION INACTIVA</h3>
    <?php } ?>
</div>

<table class="tabla_ext">
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

<?php

$comentarios = new View('comentario/formulario');
$comentarios->publicacion = $publicacion;
echo $comentarios;
?>