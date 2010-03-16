<html>
<head>
<style type="text/css">
body, table {
	font-size: 12px;
}
h2 {
	font-size: 14px; 
}
.icono {
	vertical-align: middle;
	position: relative;
	margin: 0 5px 0 0; 
}
.tabla_ext {
	width: 500px;
}
</style>
</head>
<body>
<h1>Felicitaciones!</h1>
<p>Estos son los datos de la publicacion que acabas de solicitar,
utiliza estos datos para contactar a tu contraparte y concretar el
alquiler:</p>
<h2>Datos de Contacto</h2>
<table class='tabla_ext'>
	<tr>
		<td>Nombre:</td>
		<td><strong><?php echo $publicacion->usuario->nombre; ?></strong></td>
	</tr>
	<tr>
		<td>Apellido:</td>
		<td><strong><?php echo $publicacion->usuario->apellido; ?></strong></td>
	</tr>
	<tr>
		<td>Correo Electr&oacute;nico:</td>
		<td><strong><?php echo $publicacion->usuario->correo; ?></strong></td>
	</tr>
	<tr>
		<td>Tel&eacute;fono:</td>
		<td><strong><?php echo $publicacion->usuario->telefono; ?></strong></td>
	</tr>
	<tr>
		<td>Direcci&oacute;n:</td>
		<td><strong><?php echo $publicacion->direccion; ?></strong></td>
	</tr>
</table>
<div class="clear"></div>
<?php
$vista_caracteristicas = new View('publicacion/caracteristicas');
$vista_caracteristicas->publicacion = $publicacion;
echo $vista_caracteristicas;

echo html_Core::image('media/img/iconos/eye.png', array('class'=>'icono')).html::anchor(url::site('publicacion/detalles/'.$publicacion->id), 'Ver Publicacion');
?>
<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos
para que conseguir y publicar residencias estudiantiles sea una tarea
rapida y agradable.</p>
<p>Gracias por preferirnos.</p>
</body>
</html>
