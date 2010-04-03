<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
$fecha = split("-",$publicacion->fecha);
?>
<table id="cabecera_detalles">
	<tr>
		<td align="left">Publicaci&oacute;n #<?php echo $publicacion->id ?></td>
		<td align="right">Publicada por <?php echo $publicacion->usuario->login; ?></td>
	</tr>
	<tr>
		<td align="left">Visto <?php echo $publicacion->visitas; ?> veces.</td>
		<td align="right">Solicitado por <?php echo $publicacion->calificaciones->count() ?> usuarios.</td>
	</tr>
	<tr>
		<td colspan="2" align="center">Publicado el<br/><?php echo $fecha[2]."-".$fecha[1]."-".$fecha[0]; ?></td>
	</tr>
</table>
<div class="clear"></div>
<br/>
<h2>Im&aacute;genes</h2>
<br/>
<?php
$imagen_lista = new View('imagen/lista');
$imagen_lista->imagenes = $publicacion->imagenes;
echo $imagen_lista;
?>

<?php echo $vista_caracteristicas; ?>