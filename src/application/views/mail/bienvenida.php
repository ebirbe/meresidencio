<html>
<body>
<h1>FELICITACIONES <?php echo strtoupper($usuario->login)?>!</h1>
<p>Te has registrado satisfactoriamente en <?php echo html::anchor(url::site(), NOMBRE_SITIO) ?>.
Ahora puedes disfrutar de nuestros servicios con solo iniciar sesion.</p>
<p>Antes de poder iniciar tu sesion personal debes confirmar tu correo a traves de este vinculo:</p>
<p><?php echo html::anchor('usuario/confirmar/'.$usuario->id."/".md5($usuario->login)) ?></p>
<p>Tus datos de acceso son los siguientes:</p>
<table style="margin:auto;">
	<tr>
		<th>USUARIO:</th>
		<td><?php echo $usuario->login ?></td>
	</tr>
	<tr>
		<th>CLAVE:</th>
		<td><?php echo $usuario->clave ?></td>
	</tr>
</table>
<p>En <?php echo html::anchor(url::base(), NOMBRE_SITIO) ?> trabajamos para que conseguir y
publicar residencias estudiantiles sea una tarea rapida y agradable.</p>
<p>Gracias por preferirnos.</p>
</body>
</html>
