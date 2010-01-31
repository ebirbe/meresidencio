<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php echo html_Core::script('media/js/jquery-1.3.2.js', FALSE) ?>
<?php echo html_Core::stylesheet('media/css/test','screen', FALSE) ?>
<title><?php echo html_Core::specialchars(NOMBRE_SITIO). " - ".$titulo; ?></title>
</head>
<body>
	<?php echo "\n".$contenido."\n" ?>
	<p>Generada en {execution_time} segundos, usando {memory_usage} de memoria.</p>
	<p><?php echo html_Core::anchor('/', 'Pagina de Inicio');?></p>
</body>
</html>