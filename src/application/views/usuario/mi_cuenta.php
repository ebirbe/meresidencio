<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Bienvenido <?php echo $usuario->nombre." ".$usuario->apellido?></h2>
<p>Gracias por usar los servicios de <?php echo NOMBRE_SITIO ?>, como
usuario registrado en nustro sitio web, ponemos a tu servicio las
mejores herramientas dise&ntilde;adas para facilitar el trabajo y
reducir el esfuerzo necesario que implica el conseguir una residencia
estudiantil adecauda a tus exigencias personales o el publicar las
ofertas de alquiler de manera sencilla y totalmente gratuita.</p>
<table class="tabla_ext">
	<tr>
		<td><div class="center"><?php echo html_Core::anchor(url::site('publicacion/agregar'),html_Core::image('media/img/btn_publicar.png','Publicar Residencia',FALSE))?></div></td>
		<td><div class="center"><?php echo html_Core::anchor(url::site('publicacion/lista'),html_Core::image('media/img/btn_buscar.png','Buscar Residencia',FALSE))?></div></td>
	</tr>
</table>
<br/>
<div class="clear"></div>
<?php echo $vista_notif ?>
<h2><strong>Alertas</strong></h2>
<table class="tabla_alertas">
<?php
if(is_array($usuario->alertas)){
	$i=0;
	foreach ($usuario->alertas as $fila){
		if($i++ >= 2) break;
		$item = new View('alerta/item');
		$item->fila = $fila;
		echo $item;
	}
}else{
	echo "<tr><td>No te has suscrito a ninguna alerta.</td></tr>";
}
?>
</table>
<?php echo "<br /><div align='right'>".html::anchor('alerta/mis_alertas', html_Core::image('media/img/iconos/add.png', array('class'=>'icono'))."Ver todas", array('align'=>'right'))."</div>";?>