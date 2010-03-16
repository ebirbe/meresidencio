<html>
<body>
<h1><?php echo strtoupper($usuario->nombre)?> HAY UNA NUEVA RESIDENCIA
PARA TI</h1>
<p>Hay una nueva residencia que coincide con tu alerta suscrita.</p>
<p>Los datos de la residencia son:</p>
<table style="margin: auto;">
	<tr>
		<th>ESTADO:</th>
		<td><?php echo $publicacion->zona->ciudad->estado->nombre?></td>
	</tr>
	<tr>
		<th>CIUDAD:</th>
		<td><?php echo $publicacion->zona->ciudad->nombre ?></td>
	</tr>
	<tr>
		<th>ZONA:</th>
		<td><?php echo $publicacion->zona->nombre ?></td>
	</tr>
	<tr>
		<td colspan=2><?php echo html_Core::image('media/img/iconos/eye.png', array('class'=>'icono')).html::anchor(url::site('publicacion/detalles/'.$publicacion->id), 'Ver Detalles') ?></td>
	</tr>
</table>
<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos
para que conseguir y publicar residencias estudiantiles sea una tarea
rapida y agradable.</p>
<p>Gracias por preferirnos.</p>
</body>
</html>
