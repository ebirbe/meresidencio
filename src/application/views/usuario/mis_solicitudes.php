<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Mis Solicitudes</h2>
<p>Aqu&iacute; puedes encontrar una lista de todas las residencias
para las cuales hayas solicitado los datos para formalizar la
operaci&oacute;n de alquiler. Si no has recibido o perdiste el correo
electr&oacute;nico con los datos de la residencia que deseas, podr&aacute;s
recuperarlos por aqu&iacute;.</p>
<?php echo $paginacion ?>
<div class="clear"></div>
	<?php 
	foreach ($publicacion as $fila) { 
		$pub_item = new View('publicacion/item');
		$pub_item->uso = "solicitud";
		$pub_item->publ = $fila;
		echo $pub_item;
	} 
	?>
<div class="clear"></div>
<?php echo $paginacion ?>