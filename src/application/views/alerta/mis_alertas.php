<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo new View('js/combo_regiones'); ?>
<h2><strong>Mis Alertas</strong></h2>
<p class="intro-text">Estas son las alertas que tienes activas en este momento, cada vez que
registremos una publicaci&oacute;n que coincida con los filtros seleccionados
por ti en alguna de estas alertas, un mensaje ser&aacute; enviado a tu cuenta
de correo electr&oacute;nico informandote sobre la existencia de la nueva 
publicaci&oacute;n.</p>
<div class="clear"></div>
<?php
$alerta = new View('alerta/agregar');
$alerta->mensaje = $mensaje;
echo $alerta;
?>
<table class="tabla_alertas" border=0>
	
	<?php
	foreach($alertas as $fila){
		$item = new View('alerta/item');
		$item->fila = $fila;
		echo $item;
	}
	?>
</table>


