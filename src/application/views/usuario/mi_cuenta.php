<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Bienvenido <?php echo $usuario->nombre." ".$usuario->apellido?></h2>
<p>Gracias por usar los servicios de <?php echo NOMBRE_SITIO ?>, como
usuario registrado en nustro sitio web, ponemos a tu servicio las
mejores herramientas dise&ntilde;adas para facilitar el trabajo y
reducir el esfuerzo necesario que implica el conseguir una residencia
estudiantil adecauda a tus exigencias personales o el publicar las
ofertas de alquiler de manera sencilla y totalmente gratuita.</p>
<div class="clear"></div>
<?php echo $vista_notif ?>
<h2><strong>Alertas</strong></h2>
<table class="tabla_alertas">
<?php
$i=0;
foreach ($usuario->alertas as $fila){
	if($i++ >= 2) break;
	$item = new View('alerta/item');
	$item->fila = $fila;
	echo $item;
}
?>
</table>
<?php echo "<br /><div align='right'>".html::anchor('alerta/mis_alertas', html_Core::image('media/img/iconos/add.png', array('class'=>'icono'))."Ver todas", array('align'=>'right'))."</div>";?>