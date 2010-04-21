<html>
	<head>
	</head>
	<body>
		<h1><?php echo $cliente->login ?> se ha interesado por tu
		publicacion <?php echo html::anchor(url::site("publicacion/detalles/".$calificacion->publicacion_id),"#".$calificacion->publicacion_id) ?></h1>
		<h2>en <?php echo html::anchor(url::base(),NOMBRE_SITIO) ?></h2>
		<p>El usuario antes mencionado se ha interesado por tu <b><?php echo $calificacion->publicacion->tipoinmueble->nombre ?></b>
		ubicado en <b><?php echo $calificacion->publicacion->zona->nombre ?>, <?php echo $calificacion->publicacion->zona->ciudad->nombre ?>, Estado <?php echo $calificacion->publicacion->zona->ciudad->estado->nombre ?></b></p>
		<h3>&iquest; Ya esta alquilaste esta residencia?</h3>
		<p>Desactiva esta publicaci&oacute;n <?php echo html::anchor(url::site('publicacion/editar/'.$calificacion->publicacion_id), "aqu&iacute;")?></p>
		<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos
		para que conseguir y publicar residencias estudiantiles sea una tarea
		rapida y agradable.</p>
		<p>Gracias por preferirnos.</p>
	</body>
</html>