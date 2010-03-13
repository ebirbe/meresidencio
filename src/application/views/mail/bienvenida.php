<html>
<body>
<h1>FELICITACIONES <?php echo strtoupper($usuario->nombre. " " .$usuario->apellido)?>!</h1>

<p>Te has registrado satisfactoriamente en <?php echo NOMBRE_SITIO ?>.
Ahora puedes disfrutar de nuestros servicios con solo iniciar sesion.</p>
<p>Tus datos de acceso son los siguientes:</p>
<table>
	<tr>
		<td>USUARIO:</td>
		<td><?php echo $usuario->login ?></td>
	</tr>
	<tr>
		<td>CLAVE:</td>
		<td><?php echo $usuario->clave ?></td>
	</tr>
</table>
<p>En <?php echo NOMBRE_SITIO ?> trabajamos para que conseguir y
publicar residencias estudiantiles sea una tarea rapida y agradable.</p>
<p>Gracias por preferirnos.</p>
</body>
</html>
