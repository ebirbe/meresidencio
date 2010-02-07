<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Mis Datos</h2>
<br>
<table class="comodidades">
	<tr>
		<td class="columna_titulos"><strong>Codigo:</strong></td>
		<td>#<?php echo $usuario->id ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Usuario:</strong></td>
		<td><?php echo $usuario->login ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Nombre:</strong></td>
		<td><?php echo $usuario->nombre ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Apellido:</strong></td>
		<td><?php echo $usuario->apellido ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>F. de Nac.:</strong></td>
		<td><?php echo $usuario->fecha_nac ?></td>
	</tr>
</table>
<table class="cercanias">
	<tr>
		<td class="columna_titulos"><strong>Correo:</strong></td>
		<td><?php echo $usuario->correo ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Tel&eacute;fono:</strong></td>
		<td><?php echo $usuario->telefono ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Estado:</strong></td>
		<td><?php echo $usuario->estado->nombre ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Ciudad:</strong></td>
		<td><?php echo $usuario->ciudad->nombre ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><strong>Zona:</strong></td>
		<td><?php echo $usuario->zona->nombre ?></td>
	</tr>
</table>