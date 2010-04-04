<html>
<body>
<h1><?php echo strtoupper($usuario->login)?>
 estos son tus datos de acceso.</h1>
<p>Datos de Acceso a <?php echo html::anchor(url::site(), NOMBRE_SITIO) ?></p>
<table>
	<tr>
		<th>USUARIO:</th>
		<td><?php echo $usuario->login ?></td>
	</tr>
	<tr>
		<th>CLAVE:</th>
		<td><?php echo $usuario->clave ?></td>
	</tr>
</table>
<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos
para que conseguir y publicar residencias estudiantiles sea una tarea
rapida y agradable.</p>
<p>Gracias por preferirnos.</p>
</body>
</html>
