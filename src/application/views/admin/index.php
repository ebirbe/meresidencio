<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Bienvenido Administrador</h2>
<p>Esta es la lista de los movimientos recientes realizados en el portal.</p>

<h2>Usuarios Nuevos</h2>
<br>
<table class="tabla_alertas">
	<tr align="left">
		<th>ID</th>
		<th>LOGIN</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>CORREO</th>
		<th>OPCION</th>
	</tr>
	<?php foreach ($usuario_tabla as $fila) {
		$usr_item = new View('usuario/item');
		$usr_item->fila = $fila;
		echo  $usr_item;
	}?>
</table>
<br/>
<div align="left"><?php echo html::anchor(url::site('usuario/buscar'), 'Ver Todos...');?></div>
<br/>
<div class="clear"></div>

<h2>Publicaciones Nuevas</h2>
<?php foreach ($publicacion as $fila){
	$pub_item = new View('publicacion/item');
	$pub_item->uso = NULL;
	$pub_item->publ = $fila;
	echo  $pub_item;
}?>
<div class="clear"></div>
<div align="left"><?php echo html::anchor(url::site('publicacion/lista'), 'Ver Todas...');?></div>
<br/>
<div class="clear"></div>
<h2>Im&aacute;genes Nuevas</h2>
<br/>
<?php
$imagen_lista = new View('imagen/lista');
$imagen_lista->imagenes = $imagenes;
$imagen_lista->admin = TRUE;
echo $imagen_lista;
?>
<div align="left"><?php echo html::anchor(url::site('imagen/todas'), 'Ver Todas...');?></div>
<br/>