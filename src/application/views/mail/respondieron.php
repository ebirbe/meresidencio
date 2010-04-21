<html>
	<body>
		<h1>Respondieron tu calificacion a la
		publicacion <?php echo html::anchor(url::site("publicacion/detalles/".$calificacion->publicacion_id),"#".$calificacion->publicacion_id) ?></h1>
		<h2>en <?php echo html::anchor(url::base(),NOMBRE_SITIO) ?></h2>
		<p>Para ver respuesta entra <?php echo html::anchor(url::site('calificacion/calificar/'.$calificacion->publicacion_id), "aqu&iacute;") ?></p>
		<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos
		para que conseguir y publicar residencias estudiantiles sea una tarea
		rapida y agradable.</p>
		<p>Gracias por preferirnos.</p>
	</body>
</html>