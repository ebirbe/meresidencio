<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$publicacion = "";
$borrar = "";
?>

<table class="tabla_ext">
	<tr>
	<?php if ($imagenes->count() > 0){ ?>
	<?php
	$i = 0;
	foreach($imagenes as $imagen){
		if($i++ % 3 == 0) echo "</tr><tr>";

		if(isset($admin)){
			$publicacion = "<a href='".url::site('publicacion/detalles/'.$imagen->publicacion_id)."'>".html_Core::image('media/img/iconos/eye.png', array('class'=>'icono'))."</a>";/*html::anchor(url::site('publicacion/detalles/'.$imagen->publicacion_id), 'Ver');*/
			$borrar = "<a href='".url::site('imagen/eliminar/'.$imagen->id)."'>".html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono'))."</a>";/*html::anchor(url::site('imagen/eliminar/'.$imagen->id), 'Borrar');*/
		}
		?>
		<td><a class="lightbox"
			href='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>'><img
			class="img-center"
			src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a>
		<div align="center"><?php if(isset($admin))echo $publicacion." | ".$borrar?>
		</div>
		</td>
		<?php } ?>
		<?php }else{?>
		<td align="center"><?php echo html_Core::image('media/img/no_img.gif')?></td>
		<?php }?>
	</tr>
</table>
<div class="clear"></div>
